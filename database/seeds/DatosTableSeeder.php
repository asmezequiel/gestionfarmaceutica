<?php

use Illuminate\Database\Seeder;

use App\Rol;
use App\User;
use App\Cliente;
use App\Medicamento;
use App\Movimiento;
use App\MovimientoUsuario;
use App\Entrega;

class DatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1 = new Rol();
        $rol1->descripcion = "superAdmin";
        $rol1->save();
        //
        $rol2 = new Rol();
        $rol2->descripcion = "director";
        $rol2->save();
        //
        $rol3 = new Rol();
        $rol3->descripcion = "encargado_farmaceutico";
        $rol3->save();
        //
        $rol4 = new Rol();
        $rol4->descripcion = "ayudante_farmaceutico";
        $rol4->save();



        $u = new User();
        $u->name 	= "superadmin";
        $u->email 	= "superAdmin@hot.com";
        $u->password= bcrypt("secret");
        $u->rol()->associate( $rol1 );
        $u->save();
        //
        $u = new User();
        $u->name    = "director";
        $u->email   = "director@hot.com";
        $u->password= bcrypt("secret");
        $u->rol()->associate( $rol2 );
        $u->save();
        //
        $u = new User();
        $u->name    = "encargadofarmaceutico";
        $u->email   = "encargado_farmaceutico@hot.com";
        $u->password= bcrypt("secret");
        $u->rol()->associate( $rol3 );
        $u->save();
        //
        $u = new User();
        $u->name    = "ayudante_farmaceutico";
        $u->email   = "ayudante_farmaceutico@hot.com";
        $u->password= bcrypt("secret");
        $u->rol()->associate( $rol4 );
        $u->save();
    }
}
