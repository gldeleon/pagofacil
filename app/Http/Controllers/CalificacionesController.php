<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnos;
use App\Models\Calificaciones;
use App\Models\Materias;
use Illuminate\Support\Facades\DB;

class CalificacionesController extends Controller {

    public function AddCalificacion($id, $materia, $cal) {
//        $calificacion = Calificaciones::findOrFail($id);
//        $this->validate($request, $rules)

        $calificacion = DB::insert("INSERT INTO t_calificaciones VALUES (default, " . $materia . ", " . $id . ", " . $cal . ", now())");

        if ($calificacion) {
            return response()->json()->isOk('calificacion registrada');
        } else {
            return response()->json()->isClientError();
        }
    }

    public function UpdateCalificacion($id, $materia, $cal) {
        $calificacion = DB::update("UPDATE t_calificaciones SET calificacion = " . $cal . ""
                        . "WHERE id_t_usuarios = " . $id . " AND id_t_materias = " . $materia . "");
        if ($calificacion) {
            return response()->json()->isOk('calificacion actualizada');
        } else {
            return response()->json()->isClientError();
        }
    }

    public function DeleteCalificacion($id, $materia) {
        $calificacion = DB::delete("DELETE FROM t_calificaciones WHERE id_t_usuarios = " . $id . " AND id_t_materias = " . $materia . "");
        if ($calificacion) {
            return response()->json()->isOk('calificacion eliminada');
        } else {
            return response()->json()->isClientError();
        }
    }

}
