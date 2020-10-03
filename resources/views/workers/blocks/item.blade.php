<tr>
    <th>{{ $worker->id }}</th>
    <td>{{ $worker->name }}</td>
    <td>{{ $worker->phoneNumber() }}</td>
    <td>{{ $worker->employment_date }}</td>
    <td>
        <a class="action"
           href="{{ route('workers.edit', $worker) }}"><i
                class="fa fa-edit"></i></a>
        <form class="form-remove" method="POST" action="{{ route('workers.destroy', $worker) }}">
            @csrf
            <button class="btn-remove" onclick="return confirm('Удалить?')"><i
                    class="fa fa-trash"></i></button>
        </form>
    </td>
</tr>
