<?php

namespace Tests\Feature;

use App\Models\inspetoras;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class InspetoraApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_cadastro_persists_inspetora_with_hashed_password(): void
    {
        $this->postJson('/api/salvar_inspetora', [
            'cpf' => '12345678901',
            'senha' => 'senha123',
        ])->assertOk()->assertJsonPath('erro', 'n');

        $this->assertDatabaseHas('inspetoras', ['cpf' => '12345678901']);
        $inspetora = inspetoras::where('cpf', '12345678901')->firstOrFail();
        $this->assertTrue(Hash::check('senha123', $inspetora->senha));

        $this->getJson('/api/ver_inspetora?id='.$inspetora->id)
            ->assertOk()->assertJsonPath('inspetora.cpf', '12345678901')
            ->assertJsonMissingPath('inspetora.senha');
    }

    public function test_listagem_returns_empty_list_when_no_inspetoras_exist(): void
    {
        $this->getJson('/api/listar_inspetoras')
            ->assertOk()->assertExactJson(['inspetoras' => []]);
    }
}
