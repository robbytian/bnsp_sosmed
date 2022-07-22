"use strict";
var KTDatatableColumnRenderingDemo = {
  init: function () {
    var t;
    (t = $("#kt_datatable").KTDatatable({
      data: {
        type: "remote",
        source: {
          read: { url: HOST_URL + "/api/datatables/demos/default.php" },
        },
        pageSize: 10,
        serverPaging: !0,
        serverFiltering: !0,
        serverSorting: !0,
      },
      layout: { scroll: !1, footer: !1 },
      sortable: !0,
      pagination: !0,
      search: {
        input: $("#kt_datatable_search_query"),
        delay: 400,
        key: "generalSearch",
      },
      columns: [
        {
          field: "RecordID",
          title: "#",
          sortable: "asc",
          width: 40,
          type: "number",
          selector: !1,
          textAlign: "center",
        },
        {
          field: "OrderID",
          title: "Customer",
          width: 250,
          template: function (t) {
            var a = KTUtil.getRandomInt(1, 14);
            return a > 8
              ? '<div class="d-flex align-items-center">\t\t\t\t\t\t\t\t<div class="symbol symbol-40 flex-shrink-0">\t\t\t\t\t\t\t\t\t<div class="symbol-label" style="background-image:url(\'assets/media/users/150-' +
                  a +
                  '.jpg\')"></div>\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t<div class="ml-2">\t\t\t\t\t\t\t\t\t<div class="text-dark-75 font-weight-bold line-height-sm">' +
                  t.CompanyAgent +
                  '</div>\t\t\t\t\t\t\t\t\t<a href="#" class="font-size-sm text-dark-50 text-hover-primary">' +
                  t.CompanyEmail +
                  "</a>\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t</div>"
              : '<div class="d-flex align-items-center">\t\t\t\t\t\t\t\t<div class="symbol symbol-40 symbol-' +
                  [
                    "success",
                    "primary",
                    "danger",
                    "success",
                    "warning",
                    "dark",
                    "primary",
                    "info",
                  ][KTUtil.getRandomInt(0, 7)] +
                  ' flex-shrink-0">\t\t\t\t\t\t\t\t\t<div class="symbol-label">' +
                  t.CompanyAgent.substring(0, 1) +
                  '</div>\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t<div class="ml-2">\t\t\t\t\t\t\t\t\t<div class="text-dark-75 font-weight-bold line-height-sm">' +
                  t.CompanyAgent +
                  '</div>\t\t\t\t\t\t\t\t\t<a href="#" class="font-size-sm text-dark-50 text-hover-primary">' +
                  t.CompanyEmail +
                  "</a>\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t</div>";
          },
        },
        {
          field: "Country",
          title: "Country",
          template: function (t) {
            return t.Country + " " + t.ShipCountry;
          },
        },
        {
          field: "ShipDate",
          title: "Ship Date",
          type: "date",
          format: "MM/DD/YYYY",
        },
        { field: "CompanyName", title: "Company Name" },
        {
          field: "Status",
          title: "Status",
          template: function (t) {
            var a = {
              1: { title: "Pending", class: " label-light-primary" },
              2: { title: "Delivered", class: " label-light-danger" },
              3: { title: "Canceled", class: " label-light-primary" },
              4: { title: "Success", class: " label-light-success" },
              5: { title: "Info", class: " label-light-info" },
              6: { title: "Danger", class: " label-light-danger" },
              7: { title: "Warning", class: " label-light-warning" },
            };
            return (
              '<span class="label font-weight-bold label-lg ' +
              a[t.Status].class +
              ' label-inline">' +
              a[t.Status].title +
              "</span>"
            );
          },
        },
        {
          field: "Type",
          title: "Type",
          autoHide: !1,
          template: function (t) {
            var a = {
              1: { title: "Online", state: "danger" },
              2: { title: "Retail", state: "primary" },
              3: { title: "Direct", state: "success" },
            };
            return (
              '<span class="label font-weight-bold label-lg label-' +
              a[t.Type].state +
              ' label-dot mr-2"></span><span class="font-weight-bold text-' +
              a[t.Type].state +
              '">' +
              a[t.Type].title +
              "</span>"
            );
          },
        },
        {
          field: "Actions",
          title: "Actions",
          sortable: !1,
          width: 125,
          overflow: "visible",
          autoHide: !1,
          template: function () {
            return '\t                        <div class="dropdown dropdown-inline">\t                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown">\t                                <span class="svg-icon svg-icon-md">\t                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\t                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\t                                            <rect x="0" y="0" width="24" height="24"/>\t                                            <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>\t                                        </g>\t                                    </svg>\t                                </span>\t                            </a>\t                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\t                                <ul class="navi flex-column navi-hover py-2">\t                                    <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">\t                                        Choose an action:\t                                    </li>\t                                    <li class="navi-item">\t                                        <a href="#" class="navi-link">\t                                            <span class="navi-icon"><i class="la la-print"></i></span>\t                                            <span class="navi-text">Print</span>\t                                        </a>\t                                    </li>\t                                    <li class="navi-item">\t                                        <a href="#" class="navi-link">\t                                            <span class="navi-icon"><i class="la la-copy"></i></span>\t                                            <span class="navi-text">Copy</span>\t                                        </a>\t                                    </li>\t                                    <li class="navi-item">\t                                        <a href="#" class="navi-link">\t                                            <span class="navi-icon"><i class="la la-file-excel-o"></i></span>\t                                            <span class="navi-text">Excel</span>\t                                        </a>\t                                    </li>\t                                    <li class="navi-item">\t                                        <a href="#" class="navi-link">\t                                            <span class="navi-icon"><i class="la la-file-text-o"></i></span>\t                                            <span class="navi-text">CSV</span>\t                                        </a>\t                                    </li>\t                                    <li class="navi-item">\t                                        <a href="#" class="navi-link">\t                                            <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>\t                                            <span class="navi-text">PDF</span>\t                                        </a>\t                                    </li>\t                                </ul>\t                            </div>\t                        </div>\t                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\t                            <span class="svg-icon svg-icon-md">\t                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\t                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\t                                        <rect x="0" y="0" width="24" height="24"/>\t                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\t                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\t                                    </g>\t                                </svg>\t                            </span>\t                        </a>\t                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\t                            <span class="svg-icon svg-icon-md">\t                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\t                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\t                                        <rect x="0" y="0" width="24" height="24"/>\t                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\t                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\t                                    </g>\t                                </svg>\t                            </span>\t                        </a>\t                    ';
          },
        },
      ],
    })),
      $("#kt_datatable_search_status").on("change", function () {
        t.search($(this).val().toLowerCase(), "Status");
      }),
      $("#kt_datatable_search_type").on("change", function () {
        t.search($(this).val().toLowerCase(), "Type");
      }),
      $(
        "#kt_datatable_search_status, #kt_datatable_search_type"
      ).selectpicker();
  },
};
jQuery(document).ready(function () {
  KTDatatableColumnRenderingDemo.init();
});
