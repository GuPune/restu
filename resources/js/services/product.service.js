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

    gettyperesfitter(params) {
        return ApiService.post("typeresfitter",params);
    },
    save(params) {
        return ApiService.post("transaction_temp",params);
    },

};
