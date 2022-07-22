"use strict";
var KTDatatablesAdvancedRowGrouping = {
  init: function () {
    $("#kt_datatable").DataTable({
      responsive: !0,
      pageLength: 25,
      order: [[2, "asc"]],
      drawCallback: function (t) {
        var a = this.api(),
          l = a.rows({ page: "current" }).nodes(),
          e = null;
        a.column(2, { page: "current" })
          .data()
          .each(function (t, a) {
            e !== t &&
              ($(l)
                .eq(a)
                .before(
                  '<tr class="group"><td colspan="10">' + t + "</td></tr>"
                ),
              (e = t));
          });
      },
      columnDefs: [
        { targets: [0, 2], visible: !1 },
        {
          targets: -1,
          title: "Actions",
          orderable: !1,
          render: function (t, a, l, e) {
            return '\t\t\t\t\t\t\t<div class="dropdown dropdown-inline">\t\t\t\t\t\t\t\t<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\t                                <i class="la la-cog"></i>\t                            </a>\t\t\t\t\t\t\t  \t<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\t\t\t\t\t\t\t\t\t<ul class="nav nav-hoverable flex-column">\t\t\t\t\t\t\t    \t\t<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit Details</span></a></li>\t\t\t\t\t\t\t    \t\t<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-leaf"></i><span class="nav-text">Update Status</span></a></li>\t\t\t\t\t\t\t    \t\t<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-print"></i><span class="nav-text">Print</span></a></li>\t\t\t\t\t\t\t\t\t</ul>\t\t\t\t\t\t\t  \t</div>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\t\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t\t</a>\t\t\t\t\t\t\t<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\t\t\t\t\t\t\t\t<i class="la la-trash"></i>\t\t\t\t\t\t\t</a>\t\t\t\t\t\t';
          },
        },
        {
          targets: 8,
          render: function (t, a, l, e) {
            var n = {
              1: { title: "Pending", class: "label-light-primary" },
              2: { title: "Delivered", class: " label-light-danger" },
              3: { title: "Canceled", class: " label-light-primary" },
              4: { title: "Success", class: " label-light-success" },
              5: { title: "Info", class: " label-light-info" },
              6: { title: "Danger", class: " label-light-danger" },
              7: { title: "Warning", class: " label-light-warning" },
            };
            return void 0 === n[t]
              ? t
              : '<span class="label label-lg font-weight-bold' +
                  n[t].class +
                  ' label-inline">' +
                  n[t].title +
                  "</span>";
          },
        },
        {
          targets: 9,
          render: function (t, a, l, e) {
            var n = {
              1: { title: "Online", state: "danger" },
              2: { title: "Retail", state: "primary" },
              3: { title: "Direct", state: "success" },
            };
            return void 0 === n[t]
              ? t
              : '<span class="label label-' +
                  n[t].state +
                  ' label-dot mr-2"></span><span class="font-weight-bold text-' +
                  n[t].state +
                  '">' +
                  n[t].title +
                  "</span>";
          },
        },
      ],
    });
  },
};
jQuery(document).ready(function () {
  KTDatatablesAdvancedRowGrouping.init();
});
