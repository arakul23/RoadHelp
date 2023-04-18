<x-filament::page>
    <form action="{{route('RegionMultipleCreate')}}" method="post" enctype="multipart/form-data">
        <input type="file" name="testFile" class="filepond--panel-root">
        <br>
        <button class='test' type='submit'>Добавить из файла</button>
    </form>
</x-filament::page>

<style>
   .test {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 1rem;

    }
</style>
