import ApiService from "@services/api.service";

export const ProductService = {
    get() {

      return ApiService.get("product");
    },
};
