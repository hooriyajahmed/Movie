@extends('admin.sidebar')

@section('admin')
<div class="cb-bg">

    <div class="cb-panel">

        <h2 class="cb-heading">  All Categories</h2>

        @if(session('success'))
            <div class="cb-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="cb-table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $category)
                    <tr>
                        <td>#{{ $category->id }}</td>
                        <td class="cat-name">
                            <span class="cat-icon">🎬</span>
                            {{ $category->name }}
                        </td>
                        <td>{{ $category->desc }}</td>
                        <td>
                            <a href="{{route('editcategory',$category->id)}}" class="btn edit" title="Edit Category">
                                <i class="fa-solid fa-pen-to-square">Edit</i>
                            </a>

                            <a href="{{route('deletecategory',$category->id)}}" 
                               onclick="return confirm('Delete this category?')"
                               class="btn delete" title="Delete Category">
                               <i class="fa-solid fa-trash">Delete</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

<style>
/* ===== Background ===== */
.cb-bg{
    min-height: 100vh;
    padding: 50px 30px;
    background: linear-gradient(135deg, #1b1b2f, #0f0f1f);
}

/* ===== Glass Panel ===== */
.cb-panel{
    max-width: 1000px;
    margin: auto;
    background: rgba(0,0,0,0.78);
    border-radius: 30px;
    padding: 35px;
    backdrop-filter: blur(8px);
    box-shadow: 0 0 60px rgba(255,76,96,0.18);
}

/* ===== Heading ===== */
.cb-heading{
    text-align: center;
    font-size: 1.8rem;
    margin-bottom: 25px;
    color: #ff4c60;
    text-shadow: 0 0 15px #ff4c60, 0 0 30px #ff4c60;
}

/* ===== Success Alert ===== */
.cb-success{
    background: rgba(74,255,184,0.15);
    color: #4affb8;
    padding: 14px;
    border-radius: 15px;
    text-align: center;
    margin-bottom: 20px;
}

/* ===== Table Wrapper ===== */
.cb-table-wrap{
    overflow-x: auto;
    border-radius: 20px;
    border: 1px solid rgba(255,76,96,0.4);
    box-shadow: inset 0 0 25px rgba(255,76,96,0.15);
}

/* ===== Table ===== */
table{
    width: 100%;
    border-collapse: collapse;
    color: #fff;
}

thead{
    background: linear-gradient(135deg,#ff4c60,#ff6f61);
}

thead th{
    padding: 16px;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-align: center;
}

tbody td{
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid rgba(255,255,255,0.08);
}

tbody tr:hover{
    background: rgba(255,76,96,0.15);
}

/* ===== Category Name ===== */
.cat-name{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
}

.cat-icon{
    background: #ff4c60;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 0 15px #ff4c60;
}

/* ===== Buttons ===== */
   .btn{
    padding: 7px 18px;
    color:#fff;
    border-radius: 20px;
    font-size: 0.75rem;
    text-decoration: none;
    font-weight: 600;
    margin: 0 3px;
    display: inline-block;
    transition: 0.3s;
}
    


/* Edit Button */
.btn.edit{
    background: #007bff;
    box-shadow: 0 0 15px rgba(0,123,255,0.6);
}

.btn.edit:hover{
    transform: translateY(-3px) scale(1.1);
    box-shadow: 0 0 25px rgba(0,123,255,0.9);
}

/* Delete Button */
.btn.delete{
    background: #dc3545;
    box-shadow: 0 0 15px rgba(220,53,69,0.6);
}

.btn.delete:hover{
    transform: translateY(-3px) scale(1.1);
    box-shadow: 0 0 25px rgba(220,53,69,0.9);
}
</style>
@endsection