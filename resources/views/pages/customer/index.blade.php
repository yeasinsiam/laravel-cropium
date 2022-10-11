<h1> Customer Name: <i><u>{{ auth('customer')->user()->name }}</u></i> </h1>


<form action="{{ route('customer.logout') }}" class="d-inline" method="POST">
    @csrf
    <button type="submit" class="template-btn header-btn">Log Out</button>
</form>
