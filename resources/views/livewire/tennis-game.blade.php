<div x-data="{serving : false, ended : @entangle('gameEnded')}" >
    <div class="w-2/3 m-auto text-center p-10 flex flex-col">
        <h2 class="text-3xl my-4">Tennis Game ScoreBoard</h2>

        <div class="my-4">
            <img src="{{asset('grand_slam.svg')}}" class="w-60 h-50 m-auto rounded">
        </div>
       

        <div class="my-4">
            <table class="w-1/2 m-auto table-auto border border-green-800 border-seperate">
                <thead>
                    <tr>
                        <th class="border border-green-600">Players</th>
                        <th class="border border-green-600">Points Earned</th>
                    </td>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-green-600">Player 1</td>
                        <td class="border border-green-600">{{$player1Point}}</td>
                    </tr>

                    <tr>
                        <td class="border border-green-600">Player 2</td>
                        <td class="border border-green-600">{{$player2Point}}</td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="my-4">
           Score Board 
           <div class="flex justify-center items-center mx-2 p-1" x-show="serving && !ended">
                <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-gray-900">
                    <img src="{{asset('tennisball.svg')}}">
                </div>
            </div>
            <span class="text-red-800 p-1 px-3"> {{$result}}</span>
        </div>

        <div class="my-4">
           
            <button wire:click="player1Point" x-on:click="{serving = true}" class="bg-green-900 text-white p-1 px-3 border shadow-md rounded ">
                <span>Player 1 Score</span>
            </button>

            <button wire:click="player2Point" x-on:click="{serving = true}" class="bg-blue-900 text-white p-1 px-3 border shadow-md rounded ">
                <span>Player 2 Score</span>
            </button>

            <button wire:click="resetGame" x-on:click="{serving = false}" class="bg-red-900 text-white p-1 px-3 border shadow-md  rounded">
                <span>New Game</span>
            </button>
        
        </div>

       
       
    </div>
  
</div>
