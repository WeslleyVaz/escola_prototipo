<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UsuarioApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_cadastro_persists_usuario_and_hides_hashed_password(): void
    {
        $response = $this->postJson('/api/salvar-usuario', $this->validPayload());

        $response->assertCreated()
            ->assertJsonPath('message', 'Usuário cadastrado com sucesso!')
            ->assertJsonPath('usuario.nome_usuario', 'Maria Silva')
            ->assertJsonPath('usuario.email', 'maria@example.com')
            ->assertJsonPath('usuario.tipo', 'inspetora')
            ->assertJsonMissingPath('usuario.senha');

        $usuario = Usuario::findOrFail($response->json('usuario.id'));

        $this->assertTrue(Hash::check('senha123', $usuario->senha));
        $this->assertDatabaseHas('usuario', [
            'id' => $usuario->id,
            'email' => 'maria@example.com',
        ]);
    }

    public function test_missing_fields_return_json_even_without_accept_header(): void
    {
        $this->post('/api/salvar-usuario', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['nome_usuario', 'email', 'senha', 'tipo']);

        $this->assertDatabaseCount('usuario', 0);
    }

    public function test_duplicate_email_is_rejected(): void
    {
        $this->postJson('/api/salvar-usuario', $this->validPayload())->assertCreated();

        $this->postJson('/api/salvar-usuario', $this->validPayload())
            ->assertUnprocessable()
            ->assertJsonValidationErrors('email');

        $this->assertDatabaseCount('usuario', 1);
    }

    public function test_invalid_fields_are_rejected(): void
    {
        $this->postJson('/api/salvar-usuario', [
            'nome_usuario' => str_repeat('a', 101),
            'email' => 'invalido',
            'senha' => '123',
            'tipo' => str_repeat('a', 21),
        ])->assertUnprocessable()
            ->assertJsonValidationErrors([
                'nome_usuario',
                'email',
                'senha',
                'tipo',
            ]);

        $this->assertDatabaseCount('usuario', 0);
    }

    public function test_update_accepts_own_email_and_hashes_new_password(): void
    {
        $usuario = Usuario::create($this->validPayload());

        $this->putJson('/api/alterar_usuario', [
            ...$this->validPayload(),
            'id' => $usuario->id,
            'nome_usuario' => 'Maria Atualizada',
            'senha' => 'novaSenha123',
        ])->assertOk()
            ->assertJsonPath('usuario.id', $usuario->id)
            ->assertJsonPath('usuario.nome_usuario', 'Maria Atualizada')
            ->assertJsonMissingPath('usuario.senha');

        $this->assertTrue(Hash::check('novaSenha123', $usuario->fresh()->senha));
        $this->assertDatabaseHas('usuario', ['id' => $usuario->id, 'nome_usuario' => 'Maria Atualizada']);
        $this->assertDatabaseCount('usuario', 1);
    }

    public function test_update_rejects_email_of_another_usuario(): void
    {
        $usuario = Usuario::create($this->validPayload());
        Usuario::create([...$this->validPayload(), 'email' => 'outro@example.com']);

        $this->putJson('/api/alterar_usuario', [
            ...$this->validPayload(),
            'id' => $usuario->id,
            'email' => 'outro@example.com',
            'nome_usuario' => 'Alterado',
        ])->assertUnprocessable()->assertJsonValidationErrors('email');

        $this->assertSame('maria@example.com', $usuario->fresh()->email);
        $this->assertSame('Maria Silva', $usuario->fresh()->nome_usuario);
    }

    public function test_update_returns_not_found_for_missing_usuario(): void
    {
        $this->putJson('/api/alterar_usuario', [...$this->validPayload(), 'id' => 999])
            ->assertNotFound()
            ->assertJsonPath('message', 'Usuário não encontrado');
    }

    public function test_update_requires_valid_id_and_fields(): void
    {
        $this->putJson('/api/alterar_usuario', ['id' => 'invalido'])
            ->assertUnprocessable()->assertJsonValidationErrors('id');

        $usuario = Usuario::create($this->validPayload());

        $this->putJson('/api/alterar_usuario', ['id' => $usuario->id])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['nome_usuario', 'email', 'senha', 'tipo']);
    }

    /**
     * @return array{nome_usuario: string, email: string, senha: string, tipo: string}
     */
    private function validPayload(): array
    {
        return [
            'nome_usuario' => 'Maria Silva',
            'email' => 'maria@example.com',
            'senha' => 'senha123',
            'tipo' => 'inspetora',
        ];
    }
}
