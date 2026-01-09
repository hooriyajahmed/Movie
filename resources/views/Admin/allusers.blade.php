@extends('Admin.sidebar')

@section('admin')
<div class="cb-bg">

    <div class="cb-panel">

        <h2 class="cb-heading">🎬 CineBook — Users Control</h2>

        @if(session('success'))
            <div class="cb-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="cb-table-wrap">
            <table>
                <thead>
                 <tr>
                    <th class="center">ID</th>
                    <th class="center">User</th>
                    <th class="center">Email</th>
                    <th class="center">Role</th>
                    <th class="center">Action</th>
                  </tr>
              </thead>


                <tbody>
                    @foreach($alluser as $user)
                    <tr>
                        <td>#{{ $user->id }}</td>
                        <td class="user">
                            <span class="avatar">{{ strtoupper(substr($user->name,0,1)) }}</span>
                            {{ $user->name }}
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="role {{ $user->role }}">
                                {{ strtoupper($user->role) }}
                            </span>
                        </td>
                        <td>
                            @if($user->role == 'user')
                                <a href="#" class="btn edit">Edit</a>
                                <a href="{{ route('deleteuser',$user->id) }}"
                                   onclick="return confirm('Delete this user?')"
                                   class="btn delete">Delete</a>
                            @else
                                <span class="btn locked">Locked</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

<style>
/* ===== Full Background ===== */
.cb-bg{
    min-height: 100vh;
    padding: 50px 30px;
    background: linear-gradient(135deg, #1b1b2f, #0f0f1f);
}
/* ===== Center Utility ===== */
.center{
    text-align: center;
}

/* ===== Table Border & Glow ===== */
.cb-table-wrap{
    overflow-x: auto;
    border-radius: 20px;
    border: 1px solid rgba(255,76,96,0.4);
    box-shadow: inset 0 0 25px rgba(255,76,96,0.15);
}

/* Table */
table{
    width: 100%;
    border-collapse: collapse;
    color: #fff;
}

thead th{
    text-align: center;
    border-bottom: 2px solid rgba(255,255,255,0.15);
}

/* Row separator */
tbody tr{
    position: relative;
}

tbody tr::after{
    content: "";
    position: absolute;
    left: 5%;
    bottom: 0;
    width: 90%;
    height: 1px;
    background: linear-gradient(90deg, transparent, #ff4c60, transparent);
}

/* ===== BUTTON HOVER EFFECTS ===== */
.btn{
    position: relative;
    overflow: hidden;
}

/* Glow on hover */
.btn::before{
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255,255,255,0.25);
    border-radius: 50%;
    transform: translate(-50%,-50%);
    transition: 0.4s;
}

.btn:hover::before{
    width: 200%;
    height: 200%;
}

/* Edit hover */
.btn.edit:hover{
    box-shadow: 0 0 25px rgba(0,123,255,0.9);
    transform: translateY(-3px) scale(1.08);
}

/* Delete hover */
.btn.delete:hover{
    box-shadow: 0 0 25px rgba(220,53,69,0.9);
    transform: translateY(-3px) scale(1.08);
}

/* Locked button */
.btn.locked{
    opacity: 0.6;
}

.btn.locked:hover{
    transform: none;
    box-shadow: none;
}

/* ===== Row hover polish ===== */
tbody tr:hover{
    background: linear-gradient(
        90deg,
        rgba(255,76,96,0.05),
        rgba(255,76,96,0.18),
        rgba(255,76,96,0.05)
    );
}

/* ===== Glass Panel ===== */
.cb-panel{
    max-width: 1200px;
    margin: auto;
    background: rgba(0,0,0,0.78);
    border-radius: 30px;
    padding: 35px;
    backdrop-filter: blur(8px);
    box-shadow: 0 0 60px rgba(255,76,96,0.15);
}

/* ===== Heading ===== */
.cb-heading{
    text-align: center;
    font-size: 1.9rem;
    margin-bottom: 25px;
    color: #ff4c60;
    text-shadow: 0 0 15px #ff4c60, 0 0 30px #ff4c60;
}

/* ===== Alert ===== */
.cb-success{
    background: rgba(74,255,184,0.15);
    color: #4affb8;
    padding: 14px;
    border-radius: 15px;
    text-align: center;
    margin-bottom: 20px;
}

/* ===== Table ===== */
.cb-table-wrap{
    overflow-x: auto;
    border-radius: 20px;
}

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
}

tbody td{
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid rgba(255,255,255,0.08);
}

tbody tr:hover{
    background: rgba(255,76,96,0.15);
}

/* ===== User Cell ===== */
.user{
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.avatar{
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #ff4c60;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    box-shadow: 0 0 15px #ff4c60;
}

/* ===== Role ===== */
.role{
    padding: 6px 18px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
}

.role.admin{
    background: #28a745;
    box-shadow: 0 0 12px rgba(40,167,69,0.7);
}

.role.user{
    background: #ffc107;
    color: #000;
}

/* ===== Buttons ===== */
.btn{
    padding: 7px 18px;
    border-radius: 20px;
    font-size: 0.75rem;
    text-decoration: none;
    font-weight: 600;
    margin: 0 3px;
    display: inline-block;
    transition: 0.3s;
}

.btn.edit{
    background: #007bff;
    color: #fff;
    box-shadow: 0 0 12px rgba(0,123,255,0.6);
}

.btn.delete{
    background: #dc3545;
    color: #fff;
    box-shadow: 0 0 12px rgba(220,53,69,0.6);
}

.btn.locked{
    background: #6c757d;
    color: #ddd;
    cursor: not-allowed;
}

.btn:hover{
    transform: scale(1.08);
}
</style>
@endsection
