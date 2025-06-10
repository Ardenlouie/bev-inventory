<div>
        <div class="card shadow">
            <div class="card-body">


                <div class="row mb-2">
                    <div class="col-lg-1 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h6 for="">Year</h6>
                            <select name="" class="form-control form-control-md text-uppercase" wire:model.lazy="year">
                                    <option value="0">Year</option>
                                    <option value="2025">2025</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h6 for="">From</h6>
                            <select class="form-control form-control-md text-uppercase" wire:model.lazy="from">
                                <option value="0">Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">Novemeber</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h6 for="">To</h6>
                            <select class="form-control form-control-md text-uppercase" wire:model.lazy="to">
                                <option value="0">Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">Novemeber</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12" wire:loading><i class="spinner-border"></i></div>

                </div>
                
                <div class="card-body table-responsive p-0">
                    @if (!empty($headers) && !empty($rows))
                        <table class="table-auto border-collapse border border-gray-300 w-full mt-4">
                            <thead>
                                <tr>
                                    @foreach ($headers as $header)
                                        <th class="border border-gray-300 px-4 py-2 text-left">
                                            {{ ucfirst($header) }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rows as $row)
                                    <tr>
                                        @foreach ($headers as $header)
                                            <td class="border border-gray-300 px-4 py-2">
                                                {{ $row[$header] ?? '' }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="mt-4 text-gray-600">No data available.</p>
                    @endif
                </div>
               
            </div>
        </div>
</div>