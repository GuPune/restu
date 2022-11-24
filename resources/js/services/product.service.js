import ApiService from "@services/api.service";

export const ProductService = {
    get() {
      return ApiService.get("product");
    },
    getorder(params) {
        console.log('getorder',params);
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



};
