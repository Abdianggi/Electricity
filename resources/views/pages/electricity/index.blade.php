<x-layouts.app
    :title="$title"
>
    <section id="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a
                            href="{{ url()->previous() }}"
                            class="btn btn-sm btn-primary"
                        >
                            <i class="bi bi-arrow-left"></i>
                            Back
                        </a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <table
                                class="table table-md w-100"
                                id="table-electricity"
                                data-url="{{ route('master.electricity_meter.datatable') }}"
                            >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Number</th>
                                        <th>Name</th>
                                        <th>kWh</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('custom_script')
        <script>
            let tableId = "#table-electricity";
    
            $(document).ready(function () {
                $(tableId).DataTable({
                    processing: true,
                    serverSide: true,
                    searching: false,
                    lengthChange: true,
                    responsive: true,
                    ordering: true,
                    language: {
                        processing: "Sedang Memproses",
                    },
                    ajax: {
                        url: $(tableId).data("url"),
                    },
                    columns: [
                        { data: "DT_RowIndex", name: "DT_RowIndex" },
                        { data: "number", name: "number" },
                        { data: "name", name: "name" },
                        { data: "product.name", name: "product.name" },
                    ],
                    columnDefs: [
                        {
                            targets: [0],
                            orderable: false,
                            searchable: false
                        },
                        {
                            targets: [1],
                        },
                        {
                            targets: [2],
                        },
                    ],
                })
            });
        </script>
    @endpush
</x-layouts.app>
