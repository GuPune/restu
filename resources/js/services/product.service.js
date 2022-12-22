import ApiService from "@services/api.service";

export const ProductService = {
    get() {
      return ApiService.get("product");
    },
    getorder(params) {

        return ApiService.post("transaction_orders",params);
      },
    gettyperes() {
        return ApiService.get("typeres");
      },
      gettoe() {
        return ApiService.get("toe");
    },
    gettyperesfitter(params) {
        return ApiService.post("typeresfitter",params);
    },
    save(params) {
        return ApiService.post("transaction_temp",params);
    },
    updateorder(params) {
        return ApiService.post("transaction_tempupdate",params);
    },
    delorder(params) {
        return ApiService.post("transaction_tempdelete",params);
    },


    orderscus(params) {
        return ApiService.post("orders_cus",params);
    },
    orderscus_drink(params) {
        return ApiService.post("orders_cus_drink",params);
    },

    orderupdate_pen(params) {
        return ApiService.post("updateorder_pen",params);
    },

    orderupdate_wait(params) {
        return ApiService.post("updateorder_wait",params);
    },

    orderupdate_doing(params) {
        return ApiService.post("updateorder_doing",params);
    },

    opentoe(param) {
        return ApiService.post("opentoe",param);
    },
    canceltoe(param) {
        return ApiService.post("canceltoe",param);
    },
    qrcode(param) {
        return ApiService.post("qrcode",param);
    },
    clearbill(param) {
        return ApiService.post("clearbill",param);
    },

};
