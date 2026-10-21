<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class OcorrenciasInspetorasApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_cadastro_persists_ocorrencia_with_responsible_inspector(): void
    {
        $studentId = DB::table('aluno')->insertGetId([
            'nome' => 'Aluno teste',
            'nome_responsavel' => 'Responsavel teste',
            'rm' => '2222',
            'turma' => '2A',
            'numero_responsavel' => '11999999999',
        ]);
        $inspectorId = DB::table('inspetoras')->insertGetId([
            'cpf' => '12345678901',
            'senha' => bcrypt('senha123'),
        ]);
        $payload = [
            'id_aluno' => $studentId,
            'rm_aluno' => '2222',
            'turma_aluno' => '2A',
            'inspetora_responsavel' => $inspectorId,
            'ocorrido' => 'Aluno bateu o nariz.',
            'procedimento_realizado' => 'Encaminhado para a enfermaria.',
        ];

        $this->postJson('/api/salvar_ocorrencias', $payload)
            ->assertOk()->assertJsonPath('erro', 'n');

        $this->assertDatabaseHas('ocorrencias_inspetoras', $payload);

        $this->getJson('/api/listar_ocorrencias_simples')
            ->assertOk()->assertExactJson([
                'ocorrencias' => [
                    ['rm_aluno' => '2222', 'ocorrido' => 'Aluno bateu o nariz.'],
                ],
            ]);

        $occurrenceId = DB::table('ocorrencias_inspetoras')->value('id');
        $updatePayload = [
            'id' => $occurrenceId,
            'id_aluno' => $studentId,
            'rm_aluno' => '2222',
            'turma_aluno' => '2A',
            'id_inspetora_responsavel' => $inspectorId,
            'ocorrido' => 'Aluno bateu a canela.',
            'procedimento_realizado' => 'Voltou para a aula.',
        ];

        $this->putJson('/api/alterar_ocorrencia', $updatePayload)
            ->assertOk()->assertJsonPath('erro', 'n');

        $this->assertDatabaseHas('ocorrencias_inspetoras', [
            'id' => $occurrenceId,
            'ocorrido' => 'Aluno bateu a canela.',
            'procedimento_realizado' => 'Voltou para a aula.',
        ]);
        $this->assertDatabaseCount('ocorrencias_inspetoras', 1);

        $this->deleteJson('/api/deletar_ocorrencia', ['id' => (string) $occurrenceId])
            ->assertOk()->assertJsonPath('erro', 'n');

        $this->assertDatabaseMissing('ocorrencias_inspetoras', ['id' => $occurrenceId]);
        $this->assertDatabaseHas('aluno', ['id' => $studentId]);
        $this->assertDatabaseHas('inspetoras', ['id' => $inspectorId]);
    }

    public function test_delete_returns_422_when_occurrence_id_is_missing_or_nonexistent(): void
    {
        $this->deleteJson('/api/deletar_ocorrencia', [])
            ->assertUnprocessable()->assertJsonValidationErrors('id');

        $this->deleteJson('/api/deletar_ocorrencia', ['id' => 999])
            ->assertUnprocessable()->assertJsonValidationErrors('id');

        $this->assertDatabaseCount('ocorrencias_inspetoras', 0);
    }

    public function test_update_returns_422_when_occurrence_id_is_missing_or_nonexistent(): void
    {
        $this->putJson('/api/alterar_ocorrencia', [])
            ->assertUnprocessable()->assertJsonValidationErrors('id');

        $this->putJson('/api/alterar_ocorrencia', ['id' => 999])
            ->assertUnprocessable()->assertJsonValidationErrors('id');

        $this->assertDatabaseCount('ocorrencias_inspetoras', 0);
    }

    public function test_simple_list_returns_empty_list_when_no_ocorrencias_exist(): void
    {
        $this->getJson('/api/listar_ocorrencias_simples')
            ->assertOk()->assertExactJson(['ocorrencias' => []]);
    }
}
