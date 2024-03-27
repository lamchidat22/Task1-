<?php

namespace App\Admin\DataTables\Employee;

use App\Admin\DataTables\BaseDataTable;
use App\Admin\Repositories\Employee\EmployeeRepositoryInterface;
use App\Admin\Traits\GetConfig;

class EmployeeDataTable extends BaseDataTable
{

    use GetConfig;

    protected array $actions = ['reset', 'reload'];

    public function __construct(
        EmployeeRepositoryInterface $repository
    ){
        parent::__construct();

        $this->repository = $repository;
    }

    public function getView(){
        return [
            'action' => 'admin.employees.datatable.action',
            'editlink' => 'admin.employees.datatable.editlink',
        ];
    }

    public function dataTable($query)
    {
        $this->instanceDataTable = datatables()->eloquent($query)->addIndexColumn();
        $this->filterColumnGender();
        $this->filterColumnRoles();
        $this->editColumnUsername();
        $this->editColumnGender();
        $this->editColumnRoles();
        $this->addColumnAction();
        $this->rawColumnsNew();
        return $this->instanceDataTable;
    }

    public function query(\App\Models\Employee $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        $this->instanceHtml = $this->builder()
        ->setTableId('employeeTable')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('Bfrtip')
        ->orderBy(0)
        ->selectStyleSingle();

        $this->htmlParameters();

        return $this->instanceHtml;
    }

    protected function filterColumnGender(){
        $this->instanceDataTable = $this->instanceDataTable
        ->filterColumn('gender', function($query, $keyword) {
            $query->where('gender', $keyword);
        });
    }

    protected function filterColumnRoles(){
        $this->instanceDataTable = $this->instanceDataTable
        ->filterColumn('roles', function($query, $keyword) {
            $query->where('roles', $keyword);
        });
    }

    protected function editColumnUsername(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('username', $this->view['editlink']);
    }

    protected function editColumnGender(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('gender', function($employee){
            return $employee->gender->description();
        });
    }

    protected function editColumnRoles(){
        $this->instanceDataTable = $this->instanceDataTable->editColumn('roles', function($employee){
            return $employee->roles->description();
        });
    }

    protected function addColumnAction(){
        $this->instanceDataTable = $this->instanceDataTable->addColumn('action', $this->view['action']);
    }

    protected function rawColumnsNew(){
        $this->instanceDataTable = $this->instanceDataTable->rawColumns(['username', 'action']);
    }

    protected function htmlParameters(){

        $this->parameters['buttons'] = $this->actions;

        $this->parameters['initComplete'] = "function () {

            moveSearchColumnsDatatable('#employeeTable');

            searchColumsDataTable(this);
        }";

        $this->instanceHtml = $this->instanceHtml
        ->parameters($this->parameters);
    }
}
