<x-filament::page>
    <button class='submitButton' type='button' onclick="exportCities()">Добавить из файла</button>
</x-filament::page>

<style>
    .submitButton {
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

<script type="application/javascript">
    async function exportCities() {
      /*  let elem = document.querySelector('#result');
        elem.innerHTML = "loading...";*/
        let response = await fetch('/admin/exportCities',
            {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                }
            });
        let result = await response.text();
        console.log(result);
    }
</script>
