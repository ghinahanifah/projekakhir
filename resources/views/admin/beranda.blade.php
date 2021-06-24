<x-template-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full mt-12">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> {{$title}}
                    </p>
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Barang</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga Barang</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Barang</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <?php $no =1;?>
                                @foreach ($berita as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$no}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$item->nama_barang}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$item->harga_barang}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$item->jumlah_barang}}</td>
                                    <td>
                                    <button class="px-4 py-1 text-sm rounded text-purple-600 font-semibold border border-purple-200
                                hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none"> 
                                <a href=" {{route('berita.edit',$item->id)}}">Edit </a>
                                </button>|
                                

                                 <form action="{{route('berita.destroy', $item->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  
                                  <button class="px-4 py-1 text-sm rounded text-purple-600 font-semibold border border-purple-200
                                hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none">Hapus</button>
                                </form>
                                    </td>
                                </tr>
                                <?php $no++ ?>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1 sm:br-gray-100">
                                  <div class="grid grid-cols-12">
                                <div class="col-span-6 p-4">
                                <a href="{{route('berita.create')}}"><button class="px-4 py-1 text-sm rounded text-purple-600 font-semibold border border-purple-200
                                hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none">Tambah<button></a>
                    </div>
            </div>
        </div>
    </div>
</x-template-layout>