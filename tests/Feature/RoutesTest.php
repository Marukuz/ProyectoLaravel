<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\user;

class RoutesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_home()
    {
        $response = $this->get('/');

        $response->assertStatus(302);

        $response->assertRedirect('/login');
    }

    public function test_login()
    {

        $response = $this->get('/login');

        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('auth.login');
    }
    public function test_contraseñaOlvidada()
    {

        $response = $this->get('/forgot-password');

        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('auth.forgot-password');
    }

    public function test_tarea()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/tareas');
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('tareas.listatareas');
        $response->assertViewHas('tareas');
    }

    public function test_tareaCliente()
    {

        $response = $this->get('/añadirtarea');

        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('tareas.añadirtareacliente');
    }

    public function test_tareasPendientes()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/tareaspendientes');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('tareas.listatareaspendientes');
    }

    public function test_tareaCompleta()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/tareacompleta/9');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('tareas.tareacompleta');
    }

    public function test_completarTarea()
    {
        $usuario = User::where('tipo','Operario')->first();

        $response = $this->actingAs($usuario)
            ->get('/completartarea/6');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('tareas.completartarea');
    }

    public function test_eliminarTarea()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/eliminartarea/4');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('tareas.eliminartarea');
    }
    public function test_añadirOperador()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/tareassinasignar');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('tareas.tareassinasignar');
    }
    public function test_añadirTarea()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/tareas/create');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('tareas.añadirtarea');
    }
    public function test_modificarTarea()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/tareas/6/edit');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('tareas.modificartarea');
    }

    // TESTS USUARIOS
    public function test_eliminarUsuario()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/eliminarusuario/16');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('usuarios.eliminarusuario');
    }

    public function test_crearUsuario()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/usuarios/create');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('usuarios.añadirusuario');
    }

    public function test_listaUsuarios()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/usuarios');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('usuarios.listausuarios');
    }

    public function test_editarUsuarios()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/usuarios/16/edit');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('usuarios.modificarusuario');
    }

    //TESTS CLIENTES

    public function test_añadirCliente()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/clientes/create');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('clientes.añadircliente');
    }

    public function test_eliminarCliente()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/eliminarcliente/6');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('clientes.eliminarcliente');
    }
    public function test_listaClientes()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/clientes');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('clientes.listaclientes');
    }
    public function test_modificarCliente()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/clientes/6/edit');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('clientes.modificarcliente');
    }

    //TEST CUOTAS
    public function test_añadirCuota()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/cuotas/6/crear');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('cuotas.añadircuota');
    }
    public function test_eliminarCuota()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/eliminarcuota/2');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('cuotas.eliminarcuota');
    }
    public function test_generarCuotas()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/generarcuotasview');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('cuotas.cuotamensual');
    }
    
    public function test_listaCuotas()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/generarcuotasview');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('cuotas.cuotamensual');
    }
    public function test_modificarCuotas()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/cuotas/2/edit');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('cuotas.modificarcuota');
    }
    public function test_verCuota()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->get('/cuotas/2');
            
        if ($response->status() == 302) {
            $response = $this->followingRedirects($response);
        }

        $response->assertViewIs('cuotas.listacuotas');
    }
}
