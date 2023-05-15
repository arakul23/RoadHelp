<x-filament::page>
    <button class='submitButton' type='button' onclick="exportCities()">Добавить из файла</button>

    <section class="modal hidden">
        <div style="text-align: center">
            {{__('filament::layout.loading_header_message')}}
        </div>
        <div style="text-align: center">
            <p>
                {{__('filament::layout.loading_body_message')}}
            </p>
            <div class="loader"></div>
        </div>
    </section>

    <div class="overlay hidden"></div>
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

    .modal {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 0.4rem;
        width: 450px;
        padding: 1.3rem;
        min-height: 250px;
        position: absolute;
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;
        text-align: center;
        top: 20%;
        z-index: 2;
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 15px;
    }

    .modal input {
        padding: 0.7rem 1rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 0.9em;
    }

    .modal p {
        font-size: 0.9rem;
        color: #777;
        margin: 0.4rem 0 0.2rem;
    }

    .overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(3px);
        z-index: 1;
    }

    .loader {
        border: 16px solid #f3f3f3; /* Light grey */
        border-top: 16px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 2s linear infinite;
        margin: 0 auto;
    }

    .hidden {
        display: none;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>

<script type="application/javascript">

    const modal = document.querySelector(".modal");
    const overlay = document.querySelector(".overlay");

    function openModal() {
        modal.classList.remove("hidden");
        overlay.classList.remove("hidden");
    }

    function closeModal() {
        modal.classList.add("hidden");
        overlay.classList.add("hidden");
    }

    async function exportCities() {
        openModal()
        /*  let elem = document.querySelector('#result');
          elem.innerHTML = "loading...";*/
        let response = await fetch('/admin/exportCities',
            {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                }
            });

        await closeModal();
    }
</script>
