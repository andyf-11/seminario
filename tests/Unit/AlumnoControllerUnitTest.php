<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use App\Models\Alumno;
use App\Http\Controlers\AlumnoController;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Test\TestCase;

class AlumnoControllerUnitTest extends TestCase
{
    public function test_probar_validacion_falla_para_crear_Alumnos():void
    {
        //variable para controlador
        $controller= new AlumnoController();
        $request=Request::create('/alumnos','POST',[
            'name' => '',
            'apellido' => '',
            'email' => '',
            'edad' => '',
        ]);
        $this->expectException(ValidationException::class);
        // Se espera que falle la validación
         $controller->store($request);
    }
    
     public function test_probar_validacion_correcta_para_crear_Alumnos():void
    {
        //variable para controlador
        $controller= new AlumnoController();
        $request=Request::create('/alumnos','POST',[
            'name' => 'Agar',
            'apellido' => 'Murillo',
            'email' => 'ammj239@gmail.com',
            'edad' => '23',
        ]);
        $this->expectException(ValidationException::class);
        // Se espera que falle la validación
         $controller->store($request);
         $this->assertTrue($response->isRedirect(route('alumnos.index')));
    }
}
