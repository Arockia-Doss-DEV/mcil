"use strict";var KTDatatablesExtensionsKeytable={init:function(){var t;$("#kt_table_1").DataTable({responsive:!0,select:!0,columnDefs:[{targets:-1,title:"Actions",orderable:!1,render:function(t,e,a,s){return'                        <span class="dropdown">                            <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">                              <i class="la la-ellipsis-h"></i>                            </a>                            <div class="dropdown-menu dropdown-menu-right">                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>                            </div>                        </span>                        <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">                          <i class="la la-edit"></i>                        </a>'}},{targets:8,render:function(t,e,a,s){var n={1:{title:"Pending",class:"kt-badge--brand"},2:{title:"Delivered",class:" kt-badge--metal"},3:{title:"Canceled",class:" kt-badge--primary"},4:{title:"Success",class:" kt-badge--success"},5:{title:"Info",class:" kt-badge--info"},6:{title:"Danger",class:" kt-badge--danger"},7:{title:"Warning",class:" kt-badge--warning"}};return void 0===n[t]?t:'<span class="kt-badge '+n[t].class+' kt-badge--inline kt-badge--pill">'+n[t].title+"</span>"}},{targets:9,render:function(t,e,a,s){var n={1:{title:"Online",state:"danger"},2:{title:"Retail",state:"primary"},3:{title:"Direct",state:"accent"}};return void 0===n[t]?t:'<span class="kt-badge kt-badge--'+n[t].state+' kt-badge--dot"></span>&nbsp;<span class="kt-font-bold kt-font-'+n[t].state+'">'+n[t].title+"</span>"}}]}),(t=$("#kt_table_2").DataTable({responsive:!0,select:{style:"multi",selector:"td:first-child .kt-checkable"},headerCallback:function(t,e,a,s,n){t.getElementsByTagName("th")[0].innerHTML='                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">                        <input type="checkbox" value="" class="kt-group-checkable">                        <span></span>                    </label>'},columnDefs:[{targets:0,orderable:!1,render:function(t,e,a,s){return'                        <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">                            <input type="checkbox" value="" class="kt-checkable">                            <span></span>                        </label>'}},{targets:-1,title:"Actions",orderable:!1,render:function(t,e,a,s){return'                        <span class="dropdown">                            <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">                              <i class="la la-ellipsis-h"></i>                            </a>                            <div class="dropdown-menu dropdown-menu-right">                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>                            </div>                        </span>                        <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">                          <i class="la la-edit"></i>                        </a>'}},{targets:8,render:function(t,e,a,s){var n={1:{title:"Pending",class:"kt-badge--brand"},2:{title:"Delivered",class:" kt-badge--metal"},3:{title:"Canceled",class:" kt-badge--primary"},4:{title:"Success",class:" kt-badge--success"},5:{title:"Info",class:" kt-badge--info"},6:{title:"Danger",class:" kt-badge--danger"},7:{title:"Warning",class:" kt-badge--warning"}};return void 0===n[t]?t:'<span class="kt-badge '+n[t].class+' kt-badge--inline kt-badge--pill">'+n[t].title+"</span>"}},{targets:9,render:function(t,e,a,s){var n={1:{title:"Online",state:"danger"},2:{title:"Retail",state:"primary"},3:{title:"Direct",state:"accent"}};return void 0===n[t]?t:'<span class="kt-badge kt-badge--'+n[t].state+' kt-badge--dot"></span>&nbsp;<span class="kt-font-bold kt-font-'+n[t].state+'">'+n[t].title+"</span>"}}]})).on("change",".kt-group-checkable",function(){var e=$(this).closest("table").find("td:first-child .kt-checkable"),a=$(this).is(":checked");$(e).each(function(){a?($(this).prop("checked",!0),t.rows($(this).closest("tr")).select()):($(this).prop("checked",!1),t.rows($(this).closest("tr")).deselect())})})}};jQuery(document).ready(function(){KTDatatablesExtensionsKeytable.init()});