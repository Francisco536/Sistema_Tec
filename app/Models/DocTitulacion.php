<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocTitulacion extends Model
{
    CONST TABLE = 'doc_titulacions';
    const CLASS_NAME = __CLASS__;


    CONST ID                  = 'id';
    CONST ACTO_RECEPCIONAL    = 'acto_recepcional';
    CONST NO_INCONVENIENCIA   = 'no_inconveniencia';
    CONST LIB_PROYECTO        = 'lib_proyecto';
    CONST REG_PROYECTO        = 'reg_proyecto';
    CONST SOLICITUD           = 'solicitud';
    CONST CONST_INGLES        = 'const_ingles';
    CONST CONST_SERVSOC       = 'const_servsoc';
    CONST CERTIFICADO         = 'certificado';
    CONST ACEPT_TESIS         = 'acept_tesis';

    protected $fillable = [

        'id',
        'acto_recepcional',
        'no_inconveniencia',
        'lib_proyecto',
        'reg_proyecto',
        'solicitud',
        'const_ingles',
        'const_servsoc',
        'certificado',
        'acept_tesis',

        'id_user',
    ];


    use HasFactory;
}
