 @include('layouts.header')

    <div class="container-fluid d-flex flex-column content">
        <div class="row flex-grow-1">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 p-0 bg-white">
                @include('layouts.sidebar')
                
                
            </div>
            

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 p-4 main-content">
                @include('layouts.navbar')
                
                
                <div class="container mt-5 ">
                    <div class="d-flex justify-content-center align-items-center full-height">
                        
                        <div class="container text-center">    
                        <img src="{{ asset('image/image1.jpg') }}" class="img-fluid mb-3" alt="Minecraft">
                            <h1 class=" display-5 mb-1 ">Your Favorite Sandbox Games</h1>
                            <h1 class=" display-4 mb-1 font-weight-bold">Minecraft</h1>
                            <div class="card mb-4">
                                <div class="card-header font-weight-bold">
                                    What is Minecraft?
                                </div>
                                <div class="card-body">
                                    <img src="{{ asset('image/minecraft.png') }}" class="img-fluid mb-3" alt="Minecraft">
                                    <p>Minecraft is a sandbox video game developed by Mojang Studios. It was created by Markus "Notch" Persson in the Java programming language and released as a public alpha for personal computers in 2009 before officially releasing in November 2011. Minecraft allows players to explore a blocky, procedurally generated 3D world, discover and extract raw materials, craft tools and items, and build structures or earthworks.</p>
                                </div>
                            </div>

                            <div class="card mb-4 ">
                                <div class="card-header font-weight-bold">
                                    What is a Minecraft Server?
                                </div>
                                <div class="card-body">
                                    <img src="{{ asset('image/server.png') }}" class="img-fluid mb-3" alt="server">
                                    <p>A Minecraft server is a player-owned or business-owned multiplayer game server for the 2009 Mojang video game Minecraft. Servers allow players to play online or via a local area network with other people. Each server has its own set of rules, gameplay style, and community. Players can join public servers, or create their own to invite friends or host a large community of players.</p>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header font-weight-bold">
                                    Do you need a server for minecraft?
                                </div>
                                <div class="card-body">
                                <p>When you wanna play Minecraft with your non-existent friend, you need to run a server so you can play together. Are you having a hard time finding a good server for your needs? We are here to help! We provide the best server recommendations, so you don't need to worry about choosing a bad hosting service. Just look at our recommendations below and discuss them with your friends. It's so easy! If you have a server recommendation for us, you can <a href="{{ route('layouts.create')}}"style="color: blue;">add it here</a>.</p>
                                </div>
                            </div>

                            <div class="card mb-4 ">
                                <div class="card-header font-weight-bold">
                                    How do i know which one is a good one?
                                </div>
                                <div class="card-body">
                                    <img src="{{ asset('image/image2.jpg') }}" class="img-fluid mb-3" alt="server">
                                    <p>A minecraft server has so many aspect you need to look at it, like cpu, ram, and etc. To make it simple, in this case im using Decision Support System to calculate it using Weight Product Method. The Weighted Product Model (WPM) is a technique for ranking and evaluating alternatives based on a variety of factors. It is an easy and obvious method that enables decision-makers to weigh the relative weight of many variables and make wise decisions. For short you, just need to look the result in table below which one is the best by the score. Highest the score is better.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="container mt-5 text-center">
            <h1 class="mb-4 font-weight-bold">Our Server Recommendation</h1>
            <div class="card-body">
                    <p>If you wonder which one is the best server, we got the best server for you and your friends to play.</p>
                </div>
            <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Alternatif</th>
                        <th>Price</th>
                        <th>CPU</th>
                        <th>RAM</th>
                        <th>Storage</th>
                        <th>Ping</th>
                        <th>Backup</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    @if(empty($nilaiWP))
                        <tr>
                            <td colspan="8">No data available</td>
                        </tr>
                    @else
                        @foreach($nilaiWP as $data)
                            <tr>
                                <td>{{ $data['alternatif'] }}</td>
                                <td>{{ $data['harga'] }}</td>
                                <td>{{ $data['cpu'] }}</td>
                                <td>{{ $data['ram'] }}</td>
                                <td>{{ $data['storage'] }}</td>
                                <td>{{ $data['ping'] }}</td>
                                <td>{{ $data['backup'] }}</td>
                                <<td>{{ round($data['hasil'], 4) }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            </div>
        </div>
            </div>
        </div>
    </div>

    <footer class="mt-auto">
        @include('layouts.footer')
    </footer>
