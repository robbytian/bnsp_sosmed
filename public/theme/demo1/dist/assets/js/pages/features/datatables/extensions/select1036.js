"use strict";
var KTDatatablesExtensionsKeytable = {
  init: function () {
    var t;
    $("#kt_datatable_1").DataTable({
      responsive: !0,
      select: !0,
      columnDefs: [
        {
          targets: -1,
          title: "Actions",
          orderable: !1,
          render: function (t, a, l, e) {
            return '\t\t\t\t\t\t\t<div class="dropdown dropdown-inline">\t\t\t\t\t\t\t\t<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\t                                <i class="la la-cog"></i>\t                            </a>\t\t\t\t\t\t\t  \t<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\t\t\t\t\t\t\t\t\t<ul class="nav nav-hoverable flex-column">\t\t\t\t\t\t\t    \t\t<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit Details</span></a></li>\t\t\t\t\t\t\t    \t\t<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-leaf"></i><span class="nav-text">Update Status</span></a></li>\t\t\t\t\t\t\t    \t\t<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-print"></i><span class="nav-text">Print</span></a></li>\t\t\t\t\t\t\t\t\t</ul>\t\t\t\t\t\t\t  \t</div>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\t\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t\t</a>\t\t\t\t\t\t\t<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\t\t\t\t\t\t\t\t<i class="la la-trash"></i>\t\t\t\t\t\t\t</a>\t\t\t\t\t\t';
          },
        },
        {
          width: "75px",
          targets: 8,
          render: function (t, a, l, e) {
            var s = {
              1: { title: "Pending", class: "label-light-primary" },
              2: { title: "Delivered", class: " label-light-danger" },
              3: { title: "Canceled", class: " label-light-primary" },
              4: { title: "Success", class: " label-light-success" },
              5: { title: "Info", class: " label-light-info" },
              6: { title: "Danger", class: " label-light-danger" },
              7: { title: "Warning", class: " label-light-warning" },
            };
            return void 0 === s[t]
              ? t
              : '<span class="label label-lg font-weight-bold' +
                  s[t].class +
                  ' label-inline">' +
                  s[t].title +
                  "</span>";
          },
        },
        {
          width: "75px",
          targets: 9,
          render: function (t, a, l, e) {
            var s = {
              1: { title: "Online", state: "danger" },
              2: { title: "Retail", state: "primary" },
              3: { title: "Direct", state: "success" },
            };
            return void 0 === s[t]
              ? t
              : '<span class="label label-' +
                  s[t].state +
                  ' label-dot mr-2"></span><span class="font-weight-bold text-' +
                  s[t].state +
                  '">' +
                  s[t].title +
                  "</span>";
          },
        },
      ],
    }),
      (t = $("#kt_datatable_2").DataTable({
        responsive: !0,
        select: { style: "multi", selector: "td:first-child .checkable" },
        headerCallback: function (t, a, l, e, s) {
          t.getElementsByTagName("th")[0].innerHTML =
            '\n                    <label class="checkbox checkbox-single checkbox-solid checkbox-primary mb-0">\n                        <input type="checkbox" value="" class="group-checkable"/>\n                        <span></span>\n                    </label>';
        },
        columnDefs: [
          {
            targets: 0,
            orderable: !1,
            render: function (t, a, l, e) {
              return '\n                        <label class="checkbox checkbox-single checkbox-primary mb-0">\n                            <input type="checkbox" value="" class="checkable"/>\n                            <span></span>\n                        </label>';
            },
          },
          {
            targets: -1,
            title: "Actions",
            orderable: !1,
            render: function (t, a, l, e) {
              return '\t\t\t\t\t\t\t<div class="dropdown dropdown-inline">\t\t\t\t\t\t\t\t<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\t                                <i class="la la-cog"></i>\t                            </a>\t\t\t\t\t\t\t  \t<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\t\t\t\t\t\t\t\t\t<ul class="nav nav-hoverable flex-column">\t\t\t\t\t\t\t    \t\t<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit Details</span></a></li>\t\t\t\t\t\t\t    \t\t<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-leaf"></i><span class="nav-text">Update Status</span></a></li>\t\t\t\t\t\t\t    \t\t<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-print"></i><span class="nav-text">Print</span></a></li>\t\t\t\t\t\t\t\t\t</ul>\t\t\t\t\t\t\t  \t</div>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\t\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t\t</a>\t\t\t\t\t\t\t<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\t\t\t\t\t\t\t\t<i class="la la-trash"></i>\t\t\t\t\t\t\t</a>\t\t\t\t\t\t';
            },
          },
          {
            width: "75px",
            targets: 8,
            render: function (t, a, l, e) {
              var s = {
                1: { title: "Pending", class: "label-light-primary" },
                2: { title: "Delivered", class: " label-light-danger" },
                3: { title: "Canceled", class: " label-light-primary" },
                4: { title: "Success", class: " label-light-success" },
                5: { title: "Info", class: " label-light-info" },
                6: { title: "Danger", class: " label-light-danger" },
                7: { title: "Warning", class: " label-light-warning" },
              };
              return void 0 === s[t]
                ? t
                : '<span class="label label-lg font-weight-bold' +
                    s[t].class +
                    ' label-inline">' +
                    s[t].title +
                    "</span>";
            },
          },
          {
            width: "75px",
            targets: 9,
            render: function (t, a, l, e) {
              var s = {
                1: { title: "Online", state: "danger" },
                2: { title: "Retail", state: "primary" },
                3: { title: "Direct", state: "success" },
              };
              return void 0 === s[t]
                ? t
                : '<span class="label label-' +
                    s[t].state +
                    ' label-dot mr-2"></span><span class="font-weight-bold text-' +
                    s[t].state +
                    '">' +
                    s[t].title +
                    "</span>";
            },
          },
        ],
      })).on("change", ".group-checkable", function () {
        var a = $(this).closest("table").find("td:first-child .checkable"),
          l = $(this).is(":checked");
        $(a).each(function () {
          l
            ? ($(this).prop("checked", !0),
              t.rows($(this).closest("tr")).select())
            : ($(this).prop("checked", !1),
              t.rows($(this).closest("tr")).deselect());
        });
      });
  },
};
jQuery(document).ready(function () {
  KTDatatablesExtensionsKeytable.init();
});