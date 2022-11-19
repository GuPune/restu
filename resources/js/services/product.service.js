import ApiService from "@services/api.service";

export const ProductService = {
    get() {

      return ApiService.get("product");
    },
    gettyperes() {
        return ApiService.get("typeres");
      },

    gettyperesfitter(params) {
        return ApiService.post("typeresfitter",params);
    },



};
