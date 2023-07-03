<?php

namespace App\Support\Inalto;

class TypeDifficulty
{
    public static function getTypes()
    {
        return [
            'hiking' => trans('cruds.report.fields.difficulty_class.hiking'),
            'snowshoeing' => trans('cruds.report.fields.difficulty_class.snowshoeing'),
            'mountaineering' => trans('cruds.report.fields.difficulty_class.mountaineering'),
            'skimountaineering' => trans('cruds.report.fields.difficulty_class.skimountaineering'),
            'ferrata' => trans('cruds.report.fields.difficulty_class.ferrata'),
        ];
    }

    public static function getDifficulties($type)
    {
        switch ($type) {
            case 'hiking':
                return [
                    'T1' => trans('cruds.report.fields.difficulty_class.T1'),
                    'T2' => trans('cruds.report.fields.difficulty_class.T2'),
                    'T3' => trans('cruds.report.fields.difficulty_class.T3'),
                    'T4' => trans('cruds.report.fields.difficulty_class.T4'),
                    'T5' => trans('cruds.report.fields.difficulty_class.T5'),
                ];
            break;
            case 'snowshoeing':
                return [
                    'WT1' => trans('cruds.report.fields.difficulty_class.WT1'),
                    'WT2' => trans('cruds.report.fields.difficulty_class.WT2'),
                    'WT3' => trans('cruds.report.fields.difficulty_class.WT3'),
                    'WT4' => trans('cruds.report.fields.difficulty_class.WT4'),
                    'WT5' => trans('cruds.report.fields.difficulty_class.WT5'),
                ];
            break;
            case 'mountaineering':
                return [
                    'F-' => trans('cruds.report.fields.difficulty_class.Fm'),
                    'F' => trans('cruds.report.fields.difficulty_class.F'),
                    'F+' => trans('cruds.report.fields.difficulty_class.Fp'),
                    'PD-' => trans('cruds.report.fields.difficulty_class.PDm'),
                    'PD' => trans('cruds.report.fields.difficulty_class.PD'),
                    'PD+' => trans('cruds.report.fields.difficulty_class.PDp'),
                    'AD-' => trans('cruds.report.fields.difficulty_class.ADm'),
                    'AD' => trans('cruds.report.fields.difficulty_class.AD'),
                    'AD+' => trans('cruds.report.fields.difficulty_class.ADp'),
                    'D-' => trans('cruds.report.fields.difficulty_class.Dm'),
                    'D' => trans('cruds.report.fields.difficulty_class.D'),
                    'D+' => trans('cruds.report.fields.difficulty_class.Dp'),
                    'TD-' => trans('cruds.report.fields.difficulty_class.TDm'),
                    'TD' => trans('cruds.report.fields.difficulty_class.TD'),
                    'TD+' => trans('cruds.report.fields.difficulty_class.TDp'),
                    'ED-' => trans('cruds.report.fields.difficulty_class.EDm'),
                    'ED' => trans('cruds.report.fields.difficulty_class.ED'),
                    'ED+' => trans('cruds.report.fields.difficulty_class.EDp'),
                ];
            break;
            case 'skimountaineering':
                return [
                    'MS' => trans('cruds.report.fields.difficulty_class.MS'),
                    'MSA' => trans('cruds.report.fields.difficulty_class.MSA'),
                    'BS' => trans('cruds.report.fields.difficulty_class.BS'),
                    'BSA' => trans('cruds.report.fields.difficulty_class.BSA'),
                    'OS' => trans('cruds.report.fields.difficulty_class.OS'),
                    'OSA' => trans('cruds.report.fields.difficulty_class.OSA'),
                ];
            break;

            case 'ferrata':
                return [
                    'F' => trans('cruds.report.fields.difficulty_class.F'),
                    'PD' => trans('cruds.report.fields.difficulty_class.PD'),
                    'D' => trans('cruds.report.fields.difficulty_class.D'),
                    'MD' => trans('cruds.report.fields.difficulty_class.MD'),
                    'ED' => trans('cruds.report.fields.difficulty_class.ED'),
                ];
            break;
            default:
                return [];
            break;
        }
    }
}
