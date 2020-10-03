<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Имя</th>
        <th scope="col">Телефон</th>
        <th scope="col">Дата найма</th>
        <th scope="col">Действия</th>
    </tr>
    </thead>
    <tbody>
        @each('workers.blocks.item', $workers, 'worker')
    </tbody>
</table>
