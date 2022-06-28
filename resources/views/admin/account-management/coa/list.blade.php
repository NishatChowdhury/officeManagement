<table id="coa_table" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>{{ __('Code') }}</th>
        <th>{{ __('Parent') }}</th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Status') }}</th>
        <th>{{ __('Action') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($chartOfAccounts as $coa)
        <tr>
            <td>{{ $coa->code }}</td>
            <td class="text-right"><span class="text-secondary font-italic">{{ $coa->grandparents->name ?? '' }}</span> -> <b>{{ $coa->parents->name ?? '' }}</b></td>
            <td>{{ $coa->name }}</td>
            <td>
                <!-- Rounded switch -->
                <label class="switch">
                    <input type="checkbox" {{ $coa->is_enabled ? 'checked' : '' }} onchange="statusChange({{$coa->id}})"/>
                    <span class="slider round"></span>
                </label>
            </td>
            <td>
                {!! Form::model($coa, ['route' => ['coa.destroy', $coa->id], 'method' => 'delete', 'class' => 'form-horizontal','onsubmit'=>'return confirmDelete()']) !!}

                <a href="{{ route('coa.edit',$coa->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-sm-12 col-md-9 mt-3">
        <div>{{ __('Showing') }} {{ $chartOfAccounts->firstItem() }} to {{ $chartOfAccounts->count() }} of {{ $chartOfAccounts->total() }} {{ __('entries') }}</div>
    </div>
    <div class="col-sm-12 col-md-3 mt-3">
        {{ $chartOfAccounts->links() }}
    </div>
</div>
