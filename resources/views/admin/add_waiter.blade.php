<form action="{{ url('/admin/add_waiter') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Waiter Name" required>
    <input type="email" name="email" placeholder="Waiter Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Add Waiter</button>
</form>