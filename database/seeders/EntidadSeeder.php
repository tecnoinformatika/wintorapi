<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entidads')->insert([
            "nombre" => "Departamento Nacional de planeación",
            "descripcion" => "El DNP es el centro de pensamiento del Gobierno Nacional que coordina, articula y apoya la planificación de corto, mediano y largo plazo del país, y orienta el ciclo de las políticas públicas y la priorización de los recursos de inversión.",
            "telefono" => "6013815000"
        ]);
        DB::table('entidads')->insert([
            "nombre" => "Prosperidad Social",
            "descripcion" => "Prosperidad Social ofrece diferentes programas con los cuales nuestros beneficiarios tienen acceso a la oferta social del estado.",
            "telefono" => "6015142060"
        ]);
        DB::table('entidads')->insert([
            "nombre" => "Superintendencia Nacional de Salud",
            "descripcion" => "Proteger los derechos de los usuarios del Sistema General de Seguridad Social en Salud mediante la inspección, vigilancia, control y el ejercicio de la función jurisdiccional y de conciliación, de manera transparente y oportuna.",
            "telefono" => "6017442000"
        ]);
    }
}
