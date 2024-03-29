import ApiService from "@services/api.service";

export const FrontProductService = {
    gettypelist(param) {
      return ApiService.post("fronttypelist",param);
    },
    getres(param) {
        return ApiService.post("frontres",param);
      },
    gettoe(param) {
        return ApiService.post("restoe",param);
    },
    checkout(param) {
        return ApiService.post("checkout",param);
    },
    checktoken(param) {
        return ApiService.post("ordernumber",param);
    },
    getordertoe(param) {
        return ApiService.post("order",param);
    },
    getordercheckbill(param) {
        return ApiService.post("ordercheckbill",param);
    },

    call(param) {
        return ApiService.post("call",param);
    },
    checkbill(param) {
        return ApiService.post("checkbill",param);
    },
    gettoken(param) {
        return ApiService.post("checktoken",param);
    },
    gettypegroup(param) {
        return ApiService.post("typegroup",param);
    },



};
