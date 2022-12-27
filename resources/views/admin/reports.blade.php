<x-admin-layout>
  <div class="py-6">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
      <h1 class="text-2xl font-semibold text-gray-700 uppercase">Reports</h1>
    </div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
      <!-- Replace with your content -->
      <div class="py-4">
        <livewire:admin.report />

      </div>
      <!-- /End replace -->
    </div>
  </div>
  
  <script>
    function printOut(data) {
      var mywindow = window.open('', '', 'height=1000,width=1000');
      mywindow.document.write('<html><head>');
      mywindow.document.write('<title></title>');
      mywindow.document.write(`<link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}" />`);
      mywindow.document.write('</head><body >');
      mywindow.document.write(data);
      mywindow.document.write('</body></html>');

      mywindow.document.close();
      mywindow.focus();
      setTimeout(() => {
        mywindow.print();
        return true;
      }, 1000);


    }
  </script>
</x-admin-layout>
