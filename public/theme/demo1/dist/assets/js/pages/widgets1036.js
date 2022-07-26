"use strict";
var KTWidgets = {
  init: function () {
    var t;
    !(function () {
      if (0 != $("#kt_dashboard_daterangepicker").length) {
        var t = $("#kt_dashboard_daterangepicker"),
          e = moment(),
          o = moment();
        t.daterangepicker(
          {
            direction: KTUtil.isRTL(),
            startDate: e,
            endDate: o,
            opens: "left",
            applyClass: "btn btn-sm btn-primary",
            cancelClass: "btn btn-sm btn-secondary",
            ranges: {
              Today: [moment(), moment()],
              Yesterday: [
                moment().subtract(1, "days"),
                moment().subtract(1, "days"),
              ],
              "Last 7 Days": [moment().subtract(6, "days"), moment()],
              "Last 30 Days": [moment().subtract(29, "days"), moment()],
              "This Month": [
                moment().startOf("month"),
                moment().endOf("month"),
              ],
              "Last Month": [
                moment().subtract(1, "month").startOf("month"),
                moment().subtract(1, "month").endOf("month"),
              ],
            },
          },
          s
        ),
          s(e, o, "");
      }
      function s(e, o, s) {
        var a = "",
          r = "";
        o - e < 100 || "Today" == s
          ? ((a = "Today:"), (r = e.format("MMM D")))
          : "Yesterday" == s
          ? ((a = "Yesterday:"), (r = e.format("MMM D")))
          : (r = e.format("MMM D") + " - " + o.format("MMM D")),
          t.find("#kt_dashboard_daterangepicker_date").html(r),
          t.find("#kt_dashboard_daterangepicker_title").html(a);
      }
    })(),
      (function () {
        var t = document.getElementById("kt_stats_widget_2_chart");
        if (t) {
          var e = {
              type: "doughnut",
              data: {
                datasets: [
                  {
                    data: [35, 30, 35],
                    backgroundColor: [
                      KTApp.getSettings().colors.gray["gray-300"],
                      KTApp.getSettings().colors.gray["gray-400"],
                      KTApp.getSettings().colors.theme.base.primary,
                    ],
                  },
                ],
                labels: ["Angular", "CSS", "HTML"],
              },
              options: {
                cutoutPercentage: 75,
                responsive: !0,
                maintainAspectRatio: !1,
                legend: { display: !1, position: "top" },
                title: { display: !1, text: "Technology" },
                animation: { animateScale: !0, animateRotate: !0 },
                tooltips: {
                  enabled: !0,
                  intersect: !1,
                  mode: "nearest",
                  bodySpacing: 5,
                  yPadding: 10,
                  xPadding: 10,
                  caretPadding: 0,
                  displayColors: !1,
                  backgroundColor:
                    KTApp.getSettings().colors.theme.base.primary,
                  titleFontColor: "#ffffff",
                  cornerRadius: 4,
                  footerSpacing: 0,
                  titleSpacing: 0,
                },
              },
            },
            o = t.getContext("2d");
          new Chart(o, e);
        }
      })(),
      (function () {
        var t = document.getElementById("kt_stats_widget_3_chart");
        if (t) {
          var e = {
            series: [{ name: "Net Profit", data: [30, 36, 32.5] }],
            chart: {
              type: "area",
              height: 100,
              toolbar: { show: !1 },
              style: { borderradiusbottom: "$card-border-radius" },
              zoom: { enabled: !1 },
              sparkline: { enabled: !0 },
            },
            plotOptions: {},
            legend: { show: !1 },
            dataLabels: { enabled: !1 },
            fill: { type: "solid", opacity: 1 },
            stroke: {
              curve: "smooth",
              show: !0,
              width: 3,
              colors: [KTApp.getSettings().colors.theme.base.primary],
            },
            xaxis: {
              categories: ["Feb", "Mar", "Apr"],
              axisBorder: { show: !1 },
              axisTicks: { show: !1 },
              labels: {
                show: !1,
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
              crosshairs: {
                show: !1,
                position: "front",
                stroke: {
                  color: KTApp.getSettings().colors.gray["gray-300"],
                  width: 1,
                  dashArray: 3,
                },
              },
              tooltip: {
                enabled: !0,
                formatter: void 0,
                offsetY: 0,
                style: {
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            yaxis: {
              labels: {
                show: !1,
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            states: {
              normal: { filter: { type: "none", value: 0 } },
              hover: { filter: { type: "none", value: 0 } },
              active: {
                allowMultipleDataPointsSelection: !1,
                filter: { type: "none", value: 0 },
              },
            },
            tooltip: {
              style: {
                fontSize: "12px",
                fontFamily: KTApp.getSettings()["font-family"],
              },
              y: {
                formatter: function (t) {
                  return "$" + t + " thousands";
                },
              },
            },
            colors: [KTApp.getSettings().colors.theme.light.primary],
            markers: {
              colors: [KTApp.getSettings().colors.theme.light.primary],
              strokeColor: [KTApp.getSettings().colors.theme.base.primary],
              strokeWidth: 3,
            },
          };
          new ApexCharts(t, e).render();
        }
      })(),
      (function () {
        var t = document.getElementById("kt_stats_widget_4_chart"),
          e = parseInt(KTUtil.css(t, "height")),
          o = KTUtil.hasAttr(t, "data-color")
            ? KTUtil.attr(t, "data-color")
            : "primary";
        if (t) {
          var s = {
            series: [
              { name: "Net Profit", data: [39, 36.5, 40, 36, 41, 37, 42] },
            ],
            chart: {
              type: "area",
              height: e,
              toolbar: { show: !1 },
              zoom: { enabled: !1 },
              sparkline: { enabled: !0 },
            },
            plotOptions: {},
            legend: { show: !1 },
            dataLabels: { enabled: !1 },
            fill: { type: "solid", opacity: 1 },
            stroke: {
              curve: "smooth",
              show: !0,
              width: 3,
              colors: [KTApp.getSettings().colors.theme.base[o]],
            },
            xaxis: {
              categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Avg"],
              axisBorder: { show: !1 },
              axisTicks: { show: !1 },
              labels: {
                show: !1,
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
              crosshairs: {
                show: !1,
                position: "front",
                stroke: {
                  color: KTApp.getSettings().colors.gray["gray-300"],
                  width: 1,
                  dashArray: 3,
                },
              },
              tooltip: {
                enabled: !0,
                formatter: void 0,
                offsetY: 0,
                style: {
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            yaxis: {
              labels: {
                show: !1,
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            states: {
              normal: { filter: { type: "none", value: 0 } },
              hover: { filter: { type: "none", value: 0 } },
              active: {
                allowMultipleDataPointsSelection: !1,
                filter: { type: "none", value: 0 },
              },
            },
            tooltip: {
              style: {
                fontSize: "12px",
                fontFamily: KTApp.getSettings()["font-family"],
              },
              y: {
                formatter: function (t) {
                  return "$" + t + " thousands";
                },
              },
            },
            colors: [KTApp.getSettings().colors.theme.light[o]],
            markers: {
              colors: [KTApp.getSettings().colors.theme.light[o]],
              strokeColor: [KTApp.getSettings().colors.theme.base[o]],
              strokeWidth: 3,
            },
          };
          new ApexCharts(t, s).render();
        }
      })(),
      (function () {
        var t = document.getElementById("kt_stats_widget_5_chart");
        if (t) {
          var e = {
            series: [
              { name: "Net Profit", data: [42, 36.5, 43, 36, 41.5, 37, 41] },
            ],
            chart: {
              type: "area",
              height: 120,
              toolbar: { show: !1 },
              style: { borderradiusbottom: "$card-border-radius" },
              zoom: { enabled: !1 },
              sparkline: { enabled: !0 },
            },
            plotOptions: {},
            legend: { show: !1 },
            dataLabels: { enabled: !1 },
            fill: { type: "solid", opacity: 1 },
            stroke: {
              curve: "smooth",
              show: !0,
              width: 3,
              colors: [KTApp.getSettings().colors.theme.base["gray-600"]],
            },
            xaxis: {
              categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Avg"],
              axisBorder: { show: !1 },
              axisTicks: { show: !1 },
              labels: {
                show: !1,
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
              crosshairs: {
                show: !1,
                position: "front",
                stroke: {
                  color: KTApp.getSettings().colors.gray["gray-300"],
                  width: 1,
                  dashArray: 3,
                },
              },
              tooltip: {
                enabled: !0,
                formatter: void 0,
                offsetY: 0,
                style: {
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            yaxis: {
              labels: {
                show: !1,
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            states: {
              normal: { filter: { type: "none", value: 0 } },
              hover: { filter: { type: "none", value: 0 } },
              active: {
                allowMultipleDataPointsSelection: !1,
                filter: { type: "none", value: 0 },
              },
            },
            tooltip: {
              style: {
                fontSize: "12px",
                fontFamily: KTApp.getSettings()["font-family"],
              },
              y: {
                formatter: function (t) {
                  return "$" + t + " thousands";
                },
              },
            },
            colors: [KTApp.getSettings().colors.gray["gray-200"]],
            markers: {
              colors: [KTApp.getSettings().colors.gray["gray-200"]],
              strokeColor: [KTApp.getSettings().colors.gray["gray-500"]],
              strokeWidth: 3,
            },
          };
          new ApexCharts(t, e).render();
        }
      })(),
      (function () {
        var t = document.getElementById("kt_stats_widget_6_chart");
        if (t) {
          var e = {
            series: [
              { name: "Net Profit", data: [37.5, 35.5, 38, 35, 36.5, 35, 36] },
            ],
            chart: {
              type: "area",
              height: 120,
              toolbar: { show: !1 },
              style: { borderradiusbottom: "$card-border-radius" },
              zoom: { enabled: !1 },
              sparkline: { enabled: !0 },
            },
            plotOptions: {},
            legend: { show: !1 },
            dataLabels: { enabled: !1 },
            fill: { type: "solid", opacity: 1 },
            stroke: {
              curve: "smooth",
              show: !0,
              width: 3,
              colors: [KTApp.getSettings().colors.gray["gray-400"]],
            },
            xaxis: {
              categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Avg"],
              axisBorder: { show: !1 },
              axisTicks: { show: !1 },
              labels: {
                show: !1,
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
              crosshairs: {
                show: !1,
                position: "front",
                stroke: {
                  color: KTApp.getSettings().colors.gray["gray-300"],
                  width: 1,
                  dashArray: 3,
                },
              },
              tooltip: {
                enabled: !0,
                formatter: void 0,
                offsetY: 0,
                style: {
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            yaxis: {
              labels: {
                show: !1,
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            states: {
              normal: { filter: { type: "none", value: 0 } },
              hover: { filter: { type: "none", value: 0 } },
              active: {
                allowMultipleDataPointsSelection: !1,
                filter: { type: "none", value: 0 },
              },
            },
            tooltip: {
              style: {
                fontSize: "12px",
                fontFamily: KTApp.getSettings()["font-family"],
              },
              y: {
                formatter: function (t) {
                  return "$" + t + " thousands";
                },
              },
            },
            colors: [KTApp.getSettings().colors.theme.light.light],
            markers: {
              colors: [KTApp.getSettings().colors.theme.light.light],
              strokeColor: [KTApp.getSettings().colors.gray["gray-300"]],
              strokeWidth: 3,
            },
          };
          new ApexCharts(t, e).render();
        }
      })(),
      (function () {
        var t = document.getElementById("kt_stats_widget_7_chart");
        if (t) {
          var e = {
            series: [
              { name: "Net Profit", data: [39, 36.5, 40, 36, 41, 37, 42] },
            ],
            chart: {
              type: "area",
              height: 120,
              toolbar: { show: !1 },
              style: { borderradiusbottom: "$card-border-radius" },
              zoom: { enabled: !1 },
              sparkline: { enabled: !0 },
            },
            plotOptions: {},
            legend: { show: !1 },
            dataLabels: { enabled: !1 },
            fill: { type: "solid", opacity: 1 },
            stroke: {
              curve: "smooth",
              show: !0,
              width: 3,
              colors: [KTApp.getSettings().colors.theme.base.white],
            },
            xaxis: {
              categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Avg"],
              axisBorder: { show: !1 },
              axisTicks: { show: !1 },
              labels: {
                show: !1,
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
              crosshairs: {
                show: !1,
                position: "front",
                stroke: {
                  color: KTApp.getSettings().colors.gray["gray-300"],
                  width: 1,
                  dashArray: 3,
                },
              },
              tooltip: {
                enabled: !0,
                formatter: void 0,
                offsetY: 0,
                style: {
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            yaxis: {
              labels: {
                show: !1,
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            states: {
              normal: { filter: { type: "none", value: 0 } },
              hover: { filter: { type: "none", value: 0 } },
              active: {
                allowMultipleDataPointsSelection: !1,
                filter: { type: "none", value: 0 },
              },
            },
            tooltip: {
              style: {
                fontSize: "12px",
                fontFamily: KTApp.getSettings()["font-family"],
              },
              y: {
                formatter: function (t) {
                  return "$" + t + " thousands";
                },
              },
            },
            colors: [KTApp.getSettings().colors.theme.base.primary],
            markers: {
              colors: [KTApp.getSettings().colors.theme.light.primary],
              strokeColor: [KTApp.getSettings().colors.theme.base.white],
              strokeWidth: 3,
            },
          };
          new ApexCharts(t, e).render();
        }
      })(),
      (t = function (t, e, o) {
        new ApexCharts(
          t,
          {
            series: [{ data: e }],
            colors: [o],
            chart: {
              type: "line",
              width: 100,
              height: 40,
              sparkline: { enabled: !0 },
            },
            yaxis: { min: 0, max: 30 },
            stroke: { curve: "smooth", width: 3 },
            tooltip: {
              fixed: { enabled: !1 },
              x: { show: !1 },
              y: {
                title: {
                  formatter: function (t) {
                    return "";
                  },
                },
              },
              marker: { show: !1 },
            },
          },
          o
        ).render();
      })(
        document.getElementById("kt_mixed_widget_3_sparkline_1"),
        [16, 13, 22, 12, 21, 14],
        KTApp.getSettings().colors.theme.base.danger
      ),
      t(
        document.getElementById("kt_mixed_widget_3_sparkline_2"),
        [16, 13, 22, 12, 21, 14],
        KTApp.getSettings().colors.theme.base.success
      ),
      t(
        document.getElementById("kt_mixed_widget_3_sparkline_3"),
        [16, 13, 22, 12, 21, 14],
        KTApp.getSettings().colors.theme.base.info
      ),
      t(
        document.getElementById("kt_mixed_widget_3_sparkline_4"),
        [16, 13, 22, 12, 21, 14],
        KTApp.getSettings().colors.theme.base.danger
      ),
      t(
        document.getElementById("kt_mixed_widget_3_sparkline_5"),
        [16, 13, 22, 12, 21, 14],
        KTApp.getSettings().colors.theme.base.primary
      ),
      t(
        document.getElementById("kt_mixed_widget_3_sparkline_6"),
        [16, 13, 22, 12, 21, 14],
        KTApp.getSettings().colors.theme.base.warning
      ),
      (function () {
        var t = document.getElementById("kt_mixed_widget_4_chart"),
          e = parseInt(KTUtil.css(t, "height"));
        if (t) {
          var o = {
            series: [
              {
                name: "Net Profit",
                data: [30, 30, 43, 43, 34, 34, 26, 26, 47, 47],
              },
            ],
            chart: {
              type: "area",
              height: e,
              toolbar: { show: !1 },
              zoom: { enabled: !1 },
              sparkline: { enabled: !0 },
            },
            plotOptions: {},
            legend: { show: !1 },
            dataLabels: { enabled: !1 },
            fill: { type: "solid", opacity: 1 },
            stroke: {
              curve: "smooth",
              show: !0,
              width: 3,
              colors: [KTApp.getSettings().colors.theme.base.primary],
            },
            xaxis: {
              categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul"],
              axisBorder: { show: !1 },
              axisTicks: { show: !1 },
              labels: {
                show: !1,
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
              crosshairs: {
                show: !1,
                position: "front",
                stroke: {
                  color: KTApp.getSettings().colors.gray["gray-300"],
                  width: 1,
                  dashArray: 3,
                },
              },
              tooltip: {
                enabled: !0,
                formatter: void 0,
                offsetY: 0,
                style: {
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            yaxis: {
              min: 0,
              max: 60,
              labels: {
                show: !1,
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            states: {
              normal: { filter: { type: "none", value: 0 } },
              hover: { filter: { type: "none", value: 0 } },
              active: {
                allowMultipleDataPointsSelection: !1,
                filter: { type: "none", value: 0 },
              },
            },
            tooltip: {
              style: {
                fontSize: "12px",
                fontFamily: KTApp.getSettings()["font-family"],
              },
              y: {
                formatter: function (t) {
                  return "$" + t + " thousands";
                },
              },
            },
            colors: [KTApp.getSettings().colors.theme.light.primary],
            markers: {
              colors: [KTApp.getSettings().colors.theme.light.primary],
              strokeColor: [KTApp.getSettings().colors.theme.base.primary],
              strokeWidth: 3,
            },
          };
          new ApexCharts(t, o).render();
        }
      })(),
      (function () {
        var t = document.getElementById("kt_mixed_widget_5_chart"),
          e = parseInt(KTUtil.css(t, "height"));
        if (t) {
          var o = {
            series: [
              {
                name: "Net Profit",
                data: [30, 30, 43, 43, 34, 34, 26, 26, 47, 47],
              },
            ],
            chart: {
              type: "area",
              height: e,
              toolbar: { show: !1 },
              zoom: { enabled: !1 },
              sparkline: { enabled: !0 },
            },
            plotOptions: {},
            legend: { show: !1 },
            dataLabels: { enabled: !1 },
            fill: { type: "solid", opacity: 1 },
            stroke: {
              curve: "smooth",
              show: !0,
              width: 3,
              colors: [KTApp.getSettings().colors.theme.base.success],
            },
            xaxis: {
              categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul"],
              axisBorder: { show: !1 },
              axisTicks: { show: !1 },
              labels: {
                show: !1,
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
              crosshairs: {
                show: !1,
                position: "front",
                stroke: {
                  color: KTApp.getSettings().colors.gray["gray-300"],
                  width: 1,
                  dashArray: 3,
                },
              },
              tooltip: {
                enabled: !0,
                formatter: void 0,
                offsetY: 0,
                style: {
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            yaxis: {
              min: 0,
              max: 60,
              labels: {
                show: !1,
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            states: {
              normal: { filter: { type: "none", value: 0 } },
              hover: { filter: { type: "none", value: 0 } },
              active: {
                allowMultipleDataPointsSelection: !1,
                filter: { type: "none", value: 0 },
              },
            },
            tooltip: {
              style: {
                fontSize: "12px",
                fontFamily: KTApp.getSettings()["font-family"],
              },
              y: {
                formatter: function (t) {
                  return "$" + t + " thousands";
                },
              },
            },
            colors: [KTApp.getSettings().colors.theme.light.success],
            markers: {
              colors: [KTApp.getSettings().colors.theme.light.success],
              strokeColor: [KTApp.getSettings().colors.theme.base.success],
              strokeWidth: 3,
            },
          };
          new ApexCharts(t, o).render();
        }
      })(),
      (function () {
        var t = document.getElementById("kt_charts_widget_1_chart");
        if (t) {
          var e = {
            series: [
              {
                name: "Net Profit",
                data: [20, 30, 50, 20, 60, 40, 70, 50, 55, 45],
              },
            ],
            chart: { type: "area", height: 350, toolbar: { show: !1 } },
            plotOptions: {},
            legend: { show: !1 },
            dataLabels: { enabled: !1 },
            fill: { type: "solid", opacity: 1 },
            stroke: {
              curve: "smooth",
              show: !0,
              width: 3,
              colors: [KTApp.getSettings().colors.theme.base.primary],
            },
            xaxis: {
              categories: [
                "1 Aug",
                "2 Aug",
                "3 Aug",
                "4 Aug",
                "5 Aug",
                "6 Aug",
                "7 Aug",
                "8 Aug",
                "9 Aug",
                "10 Aug",
              ],
              axisBorder: { show: !1 },
              axisTicks: { show: !1 },
              labels: {
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
              crosshairs: {
                position: "front",
                stroke: {
                  color: KTApp.getSettings().colors.theme.base.primary,
                  width: 1,
                  dashArray: 3,
                },
              },
              tooltip: {
                enabled: !0,
                formatter: void 0,
                offsetY: 0,
                style: {
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            yaxis: {
              min: 0,
              max: 90,
              labels: {
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            states: {
              normal: { filter: { type: "none", value: 0 } },
              hover: { filter: { type: "none", value: 0 } },
              active: {
                allowMultipleDataPointsSelection: !1,
                filter: { type: "none", value: 0 },
              },
            },
            tooltip: {
              style: {
                fontSize: "12px",
                fontFamily: KTApp.getSettings()["font-family"],
              },
              y: {
                formatter: function (t) {
                  return "$" + t + " thousands";
                },
              },
            },
            colors: [KTApp.getSettings().colors.theme.light.primary],
            grid: {
              borderColor: KTApp.getSettings().colors.gray["gray-200"],
              strokeDashArray: 4,
              yaxis: { lines: { show: !0 } },
            },
            markers: {
              strokeColor: KTApp.getSettings().colors.theme.base.primary,
              strokeWidth: 3,
            },
          };
          new ApexCharts(t, e).render();
        }
      })(),
      (function () {
        var t = document.getElementById("kt_charts_widget_2_chart");
        if (t) {
          var e = {
            series: [
              { name: "Net Profit", data: [30, 40, 60, 50, 70, 50, 70] },
              { name: "Revenue", data: [35, 45, 65, 55, 75, 55, 75] },
            ],
            chart: { type: "bar", height: 350, toolbar: { show: !1 } },
            plotOptions: {
              bar: {
                horizontal: !1,
                columnWidth: ["30%"],
                endingShape: "rounded",
              },
            },
            legend: { show: !1 },
            dataLabels: { enabled: !1 },
            stroke: { show: !0, width: 2, colors: ["transparent"] },
            xaxis: {
              categories: [
                "1 Aug",
                "2 Aug",
                "3 Aug",
                "4 Aug",
                "5 Aug",
                "6 Aug",
                "7 Aug",
              ],
              axisBorder: { show: !1 },
              axisTicks: { show: !1 },
              labels: {
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            yaxis: {
              labels: {
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            fill: { opacity: 1 },
            states: {
              normal: { filter: { type: "none", value: 0 } },
              hover: { filter: { type: "none", value: 0 } },
              active: {
                allowMultipleDataPointsSelection: !1,
                filter: { type: "none", value: 0 },
              },
            },
            tooltip: {
              style: {
                fontSize: "12px",
                fontFamily: KTApp.getSettings()["font-family"],
              },
              y: {
                formatter: function (t) {
                  return "$" + t + " thousands";
                },
              },
            },
            colors: [
              KTApp.getSettings().colors.theme.base.primary,
              KTApp.getSettings().colors.theme.light.primary,
            ],
            grid: {
              borderColor: KTApp.getSettings().colors.gray["gray-200"],
              strokeDashArray: 4,
              yaxis: { lines: { show: !0 } },
            },
          };
          new ApexCharts(t, e).render();
        }
      })(),
      (function () {
        var t = document.getElementById("kt_charts_widget_3_chart");
        if (t) {
          var e = {
            series: [
              { name: "Net Profit", data: [30, 40, 40, 90, 60, 70, 50] },
            ],
            chart: { type: "area", height: 350, toolbar: { show: !1 } },
            plotOptions: {},
            legend: { show: !1 },
            dataLabels: { enabled: !1 },
            fill: { type: "solid", opacity: 1 },
            stroke: {
              curve: "smooth",
              show: !0,
              width: 3,
              colors: [KTApp.getSettings().colors.theme.base.danger],
            },
            xaxis: {
              categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
              axisBorder: { show: !1 },
              axisTicks: { show: !1 },
              labels: {
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
              crosshairs: {
                position: "front",
                stroke: {
                  color: KTApp.getSettings().colors.theme.base.danger,
                  width: 1,
                  dashArray: 3,
                },
              },
              tooltip: {
                enabled: !0,
                formatter: void 0,
                offsetY: 0,
                style: {
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            yaxis: {
              labels: {
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            states: {
              normal: { filter: { type: "none", value: 0 } },
              hover: { filter: { type: "none", value: 0 } },
              active: {
                allowMultipleDataPointsSelection: !1,
                filter: { type: "none", value: 0 },
              },
            },
            tooltip: {
              style: {
                fontSize: "12px",
                fontFamily: KTApp.getSettings()["font-family"],
              },
              y: {
                formatter: function (t) {
                  return "$" + t + " thousands";
                },
              },
            },
            colors: [KTApp.getSettings().colors.theme.light.danger],
            grid: {
              borderColor: KTApp.getSettings().colors.gray["gray-200"],
              strokeDashArray: 4,
              yaxis: { lines: { show: !0 } },
            },
            markers: {
              strokeColor: KTApp.getSettings().colors.theme.base.info,
              strokeWidth: 3,
            },
          };
          new ApexCharts(t, e).render();
        }
      })(),
      (function () {
        var t = document.getElementById("kt_charts_widget_4_chart");
        if (t) {
          var e = {
            series: [
              { name: "Net Profit", data: [60, 50, 80, 40, 100, 60] },
              { name: "Revenue", data: [70, 60, 110, 40, 50, 70] },
            ],
            chart: { type: "area", height: 350, toolbar: { show: !1 } },
            plotOptions: {},
            legend: { show: !1 },
            dataLabels: { enabled: !1 },
            fill: { type: "solid", opacity: 1 },
            stroke: { curve: "smooth" },
            xaxis: {
              categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul"],
              axisBorder: { show: !1 },
              axisTicks: { show: !1 },
              labels: {
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
              crosshairs: {
                position: "front",
                stroke: {
                  color: KTApp.getSettings().colors.theme.light.primary,
                  width: 1,
                  dashArray: 3,
                },
              },
              tooltip: {
                enabled: !0,
                formatter: void 0,
                offsetY: 0,
                style: {
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            yaxis: {
              labels: {
                style: {
                  colors: KTApp.getSettings().colors.gray["gray-500"],
                  fontSize: "12px",
                  fontFamily: KTApp.getSettings()["font-family"],
                },
              },
            },
            states: {
              normal: { filter: { type: "none", value: 0 } },
              hover: { filter: { type: "none", value: 0 } },
              active: {
                allowMultipleDataPointsSelection: !1,
                filter: { type: "none", value: 0 },
              },
            },
            tooltip: {
              style: {
                fontSize: "12px",
                fontFamily: KTApp.getSettings()["font-family"],
              },
              y: {
                formatter: function (t) {
                  return "$" + t + " thousands";
                },
              },
            },
            colors: [
              KTApp.getSettings().colors.theme.light.primary,
              KTApp.getSettings().colors.theme.light.success,
            ],
            grid: {
              borderColor: KTApp.getSettings().colors.gray["gray-200"],
              strokeDashArray: 4,
              yaxis: { lines: { show: !0 } },
            },
            markers: {
              colors: [
                KTApp.getSettings().colors.theme.light.primary,
                KTApp.getSettings().colors.theme.light.success,
              ],
              strokeColor: [
                KTApp.getSettings().colors.theme.light.primary,
                KTApp.getSettings().colors.theme.light.success,
              ],
              strokeWidth: 3,
            },
          };
          new ApexCharts(t, e).render();
        }
      })();
  },
};
"undefined" != typeof module && (module.exports = KTWidgets),
  jQuery(document).ready(function () {
    KTWidgets.init();
  });
