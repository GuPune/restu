import ApiService from "@services/api.service";

export const FrontProductService = {
    gettypelist() {
      return ApiService.get("fronttypelist");
    },




};
