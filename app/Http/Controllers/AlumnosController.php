<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnos;
use App\Models\Calificaciones;
use App\Models\Materias;
use Illuminate\Support\Facades\DB;

class AlumnosController extends Controller {

    public function index() {
        $alumnos = Alumnos::all();        
        if ($calificacion) {
            return response()->json()->isOk($alumnos);
        } else {
            return response()->json()->isClientError();
        }
    }

    public function getAlumnos($id) {

        $alumnos = DB::select("SELECT al.id_t_usuarios, concat(al.nombre, al.ap_paterno, al.ap_materno) AS nombre, mat.nombre AS materia, cal.calificacion, DATE_FORMAT(cal.fecha_registro, '%d/%m/%Y') FROM t_alumnos al
                                LEFT JOIN t_calificaciones cal ON al.id_t_usuarios=cal.id_t_usuarios
                                LEFT JOIN t_materias mat ON cal.id_t_materias=mat.id_t_materias
                                WHERE al.id_t_usuarios = " . $id . "");
        //dd($alumnos);
        if ($calificacion) {
            return response()->json()->isOk($alumnos);
        } else {
            return response()->json()->isClientError();
        }        
    }

}
