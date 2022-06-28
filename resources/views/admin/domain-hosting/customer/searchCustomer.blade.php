<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>{{ __('Sl') }}</th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Address') }}</th>
        <th>{{ __('Mobile') }}</th>
        <th>{{ __('Email') }}</th>
        <th>{{ __('Contact Person') }}</th>
        <th>{{ __('Contact Person Phone') }}</th>
        <th>{{ __('Action') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($customers as $key => $customer)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->mobile }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->contact_person }}</td>
            <td>{{ $customer->contact_person_phone }}</td>
            <td>
                {{ Form::open(['url'=>['admin/customer',$customer->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                <a href="{{ route('customer.edit',$customer->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                {{ Form::close() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
