<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\user;

class FormTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_crearClientesForm()
    {
        $usuario = User::where('tipo','Administrador')->first();

        $response = $this->actingAs($usuario)
            ->post('clientes',[
                'dni' => '77750726P',
                'nombre' => 'Marc',
                'telefono' => '625280695',
                'correo' => 'marccocmc@gmail.com',
                'direccion' => 'Calle Jabugo 8',
                'cuenta_corriente' => 'ES1312312',
                'pais' => 'España',
                'moneda' => 'EUR',
                'importe_mensual' => '19',
            ]);
    
        if ($response->status() == 302) {
            $response = $this->followRedirects($response);
        }
    
        $response->assertViewIs('clientes.listaclientes');
    }
}
