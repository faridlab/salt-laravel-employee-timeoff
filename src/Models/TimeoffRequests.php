<?php

namespace SaltEmployeeTimeoff\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Schema;

use SaltLaravel\Models\Resources;
use SaltLaravel\Traits\ObservableModel;
use SaltLaravel\Traits\Uuids;

use SaltEmployeeTimeoff\Observers\RequestApproved;
use SaltEmployeeTimeoff\Observers\RequestRejected;

class TimeoffRequests extends Resources {

    use Uuids;
    use ObservableModel;
    use RequestApproved;
    use RequestRejected;

    protected $filters = [
        'default',
        'search',
        'fields',
        'relationship',
        'withtrashed',
        'orderby',

        // Fields table
        'id',
        'organization_id',
        'timeoff_id',
        'employee_id',
        'date_start',
        'date_end',
        'status',
        'note',
        'approval_employee_id',
        'note_reject',
    ];

    protected $rules = array(
        'organization_id' => 'required|string',
        'timeoff_id' => 'required|string',
        'employee_id' => 'required|string',
        'date_start' => 'required|date',
        'date_end' => 'required|date',
        'status' => 'required|string',
        'note' => 'required|string',
        'approval_employee_id' => 'nullable|string',
        'note_reject' => 'nullable|string',
    );

    protected $auths = array (
        'index',
        'store',
        'show',
        'update',
        'patch',
        'destroy',
        'trash',
        'trashed',
        'restore',
        'delete',
        'import',
        'export',
        'report'
    );

    protected $structures = array();
    protected $forms = array();

    protected $searchable = array(
        'organization_id',
        'timeoff_id',
        'employee_id',
        'date_start',
        'date_end',
        'status',
        'note',
        'approval_employee_id',
        'note_reject',
    );

    protected $fillable = array(
        'organization_id',
        'timeoff_id',
        'employee_id',
        'date_start',
        'date_end',
        'status',
        'note',
        'approval_employee_id',
        'note_reject',
    );

    public function organization() {
        return $this->belongsTo('SaltOrganization\Models\Organizations', 'organization_id', 'id');
    }

    public function employee() {
        return $this->belongsTo('SaltEmployeeTimeoff\Models\Employees', 'employee_id', 'id')->withTrashed();
    }

    public function timeoff() {
        return $this->belongsTo('SaltEmployeeTimeoff\Models\Timeoffs', 'timeoff_id', 'id')->withTrashed();
    }

    public function approver() {
        return $this->belongsTo('SaltEmployeeTimeoff\Models\Employees', 'approval_employee_id', 'id')->withTrashed();
    }
}
