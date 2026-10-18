<?php

namespace Tests\Feature;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class OcorrenciaApiTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        if (DB::connection()->getDriverName() === 'sqlite') {
            foreach ([
                '2026_09_30_164837_create_aluno.php',
                '2026_09_30_165517_create_ocorrencias.php',
            ] as $migration) {
                (require database_path('migrations/'.$migration))->up();
            }

            $migration = glob(database_path('migrations/*create_inspetoras.php'))[0];
            (require $migration)->up();
        }
    }

    public function test_salvar_ocorrencias_persists_id_inspetora(): void
    {
        if (Schema::hasColumn('ocorrencias', 'inspetora_responsavel')) {
            Schema::table('ocorrencias', function (Blueprint $table): void {
                $table->renameColumn('inspetora_responsavel', 'id_inspetora');
            });
        }

        $payload = $this->validPayload();
        $inspectorId = $payload['inspetora_responsavel'];
        unset($payload['inspetora_responsavel']);
        $payload['id_inspetora'] = $inspectorId;
        $payload['ocorrido'] = 'Desentendimento entre alunos.';

        $this->postJson('/api/salvar_ocorrencias', $payload)
            ->assertOk()
            ->assertJsonPath('erro', 'n');

        $this->assertDatabaseHas('ocorrencias', $payload);
    }

    public function test_cadastro_persists_all_validated_fields(): void
    {
        $payload = $this->validPayload();
        $response = $this->postJson('/api/new_ocorrencia', [
            ...$payload,
            'id' => 999999,
            'created_at' => '2000-01-01 00:00:00',
        ]);

        $response->assertCreated()
            ->assertJsonPath('message', 'Ocorrência cadastrada com sucesso!');

        $id = $response->json('ocorrencia.id');
        $this->assertDatabaseHas('ocorrencias', ['id' => $id, ...$payload]);

        $persisted = (array) DB::table('ocorrencias')->where('id', $id)->first();
        foreach ($payload as $field => $value) {
            $this->assertEquals($value, $persisted[$field]);
            $this->assertEquals($persisted[$field], $response->json('ocorrencia.'.$field));
        }

        $this->assertNotEquals(999999, $id);
        $this->assertNotEquals('2000-01-01 00:00:00', $persisted['created_at']);
    }

    public function test_missing_fields_return_json_without_accept_header(): void
    {
        $count = DB::table('ocorrencias')->count();

        $this->post('/api/new_ocorrencia', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'rm_aluno', 'id_aluno', 'turma_aluno',
                'inspetora_responsavel', 'procedimento_realizado',
            ]);

        $this->assertDatabaseCount('ocorrencias', $count);
    }

    public function test_nonexistent_foreign_keys_are_rejected(): void
    {
        $payload = $this->validPayload();
        $count = DB::table('ocorrencias')->count();

        $this->postJson('/api/new_ocorrencia', [
            ...$payload,
            'id_aluno' => DB::table('aluno')->max('id') + 1,
            'inspetora_responsavel' => DB::table('inspetoras')->max('id') + 1,
        ])->assertUnprocessable()
            ->assertJsonValidationErrors(['id_aluno', 'inspetora_responsavel']);

        $this->assertDatabaseCount('ocorrencias', $count);
    }

    public function test_invalid_types_and_lengths_are_rejected(): void
    {
        $count = DB::table('ocorrencias')->count();

        $this->postJson('/api/new_ocorrencia', [
            'rm_aluno' => '123456',
            'id_aluno' => 'invalido',
            'turma_aluno' => str_repeat('a', 11),
            'inspetora_responsavel' => 'Inspetora responsável',
            'procedimento_realizado' => str_repeat('a', 201),
        ])->assertUnprocessable()
            ->assertJsonValidationErrors([
                'rm_aluno', 'id_aluno', 'turma_aluno',
                'inspetora_responsavel', 'procedimento_realizado',
            ]);

        $this->assertDatabaseCount('ocorrencias', $count);
    }

    /**
     * @return array{rm_aluno: string, id_aluno: int, turma_aluno: string, inspetora_responsavel: int, procedimento_realizado: string}
     */
    private function validPayload(): array
    {
        $studentId = DB::table('aluno')->insertGetId([
            'nome' => 'Aluno teste',
            'nome_responsavel' => 'Responsável teste',
            'rm' => '02233',
            'turma' => '2ºA',
            'numero_responsavel' => '11999999999',
        ]);
        $inspectorId = DB::table('inspetoras')->insertGetId([
            'cpf' => '00000000000',
            'senha' => bcrypt('senha-teste'),
        ]);

        return [
            'rm_aluno' => '02233',
            'id_aluno' => $studentId,
            'turma_aluno' => '2ºA',
            'inspetora_responsavel' => $inspectorId,
            'procedimento_realizado' => 'Aluno encaminhado para a direção.',
        ];
    }
}
