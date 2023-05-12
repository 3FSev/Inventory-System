@include('theme.head')
@include('theme.topbar')
<div class="option">
    <div class="table-responsive">
        <div>
            <button type="submit" class="btn btn-success" style="float:right; margin-left: 5px;" onclick="printTable()"><i
                    class="fa fa-print fa-fw"></i>Print</button>
                    <button type="button" class="btn btn-success" style="float:right; margin-left: 5px;" onclick="exportToExcel()">
                        <i class="fa fa-table fa-fw"></i>Export</button>
            <a href="../employee" style="float:right;" type="button" class="btn btn-primary"><i
                    class="fas fa-flip-horizontal fa-fw fa-share"></i> Back</a>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <div class="header">
                <h5>ORIENTAL MINDORO ELECTRIC COOPERATIVE, INC</h5>
                <h5>(O R M E C O)</h5>
                <h6>Simaron, Calapan City</h6><br>
                <p><b>MEMORANDUM RECEIPT FOR ACCOUNTABILITIES ( EQUIPMENT, TOOLS, DEVICES AND OTHER
                    <br> OFFICE MATERIALS WITH SEMI-EXPENDABLE AND NON-EXPENDABLE PROPERTIES )</b> <br>	<br>

                          I, {{$user->name}}, do hereby acknowledged to have personally received from JAIME B. GARONG, JR. the Warehouse
                    Supervisor, the following office property for which I shall be fully responsible in accordance to the Warehousing, Accounting and
                    Auditing Procedures and regulation of ORMECO and it shall be used only for my official functions and duties in the above
                    mentioned electric cooperative. <br><br>

                          This is in compliance with the <b>Energy Regulatory Commission ( ERC )</b> in preparation for <b>Accounting Manual Cost</b>
                    submitted by ORMECO with the <b>cut-off  date, December 31, 2014</b>
                    </p>
            </div><br>
            <table class="table table-bordered" id="wivTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>WIV#</th>
                        <th>Date</th>
                        <th>JV#</th>
                        <th>Date</th>
                        <th>Particulars</th>
                        <th>QTY. Unit</th>
                        <th>Unit Cost</th>
                        <th>Amount</th>
                        <th>MRT</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wivs as $wiv)
                        @foreach ($wiv->items as $item)
                        <tr>
                            <td>
                                {{$wiv->id}}
                            </td>
                            <td>
                                {{$wiv->wiv_date}}
                            </td>
                            <td>
                                {{$wiv->jv}}
                            </td>
                            <td>
                                {{$wiv->jv_date}}
                            </td>
                            <td>
                                {{$item->name}}, <br>
                                {{$item->description}}
                            </td>
                            <td>
                                {{$item->pivot->quantity}} {{$item->unit}}
                            </td>
                            <td>
                                {{ number_format($item->price, 2, '.', ',') }}
                            </td>
                            <td>
                                {{ number_format($item->pivot->amount, 2, '.', ',') }}
                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
            <div class="table-footer">
                <h6><br>Conformed : <br>
                    &emsp;<b>{{$user->name}} </b><br>
                    &emsp;{{$user->department->name}} <br>
                    &emsp;Accountable Employee <br>
                </h6>
            </div>
        </div>
    </div>
</div>
@include('theme.footer')
<script>
    function exportToExcel() {
        /* Get the table element */
        var table = document.getElementById("wivTable");

        /* Convert the table to a worksheet */
        var worksheet = XLSX.utils.table_to_sheet(table);

        /* Convert the worksheet to a workbook */
        var workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, "Sheet1");

        /* Save the workbook to a file */
        var filename = "wiv_table.xlsx";
        XLSX.writeFile(workbook, filename);
    }

    function printTable() {
        window.print();
    }
</script>

