import Vue from 'vue';

Vue.component(
    "create-product",
    require("./components/product/CreateProduct.vue").default
);

Vue.component(
    "add-product-to-variant",
    require("./components/product/color/AddColorToVariant.vue").default
);

Vue.component(
    "manage-labels",
    require("./components/label/ManageLabels.vue").default
);

Vue.component(
    "manage-colors",
    require("./components/color/ManageColors.vue").default
);

Vue.component(
    "manage-menu",
    require("./components/menu/ManageMenu.vue").default
);
Vue.component(
    "manage-sizes",
    require("./components/size/ManageSize.vue").default
);

Vue.component(
    "manage-papers",
    require("./components/paper/ManagePaper.vue").default
);

Vue.component(
    "manage-finishings",
    require("./components/finishing/ManageFinishing.vue").default
);

Vue.component(
    "manage-finishing-options",
    require("./components/finishing/option/ManageOptions.vue").default
);

Vue.component(
    "manage-printings",
    require("./components/printing/ManagePrinting.vue").default
);

Vue.component(
    "manage-printing-options",
    require("./components/printing/option/ManageOptions.vue").default
);

Vue.component(
    "manage-categories",
    require("./components/Category/ManageCategories.vue").default
);

Vue.component(
    "manage-sub-categories",
    require("./components/Category/Sub/ManageCategories.vue").default
);

Vue.component(
    "change-status",
    require("./components/ChangeStatus.vue").default
);
Vue.component(
    "delete-record",
    require("./components/DeleteRecord.vue").default
);
Vue.component(
    "assign-label",
    require("./components/label/assign/AssignLabel.vue").default
);
Vue.component(
    "edit-assigned-label",
    require("./components/label/assign/EditLabel.vue").default
);

Vue.component(
    "category-menu",
    require("./components/Category/CategoryMenu.vue").default
);

Vue.component(
    "category-extra",
    require("./components/Category/CategoryExtra.vue").default
);

Vue.component(
    "sub-category-extra",
    require("./components/Category/Sub/CategoryExtra.vue").default
);

Vue.component(
    "assigned-label-row",
    require("./components/label/assign/Labels.vue").default
);

Vue.component(
    "assigned-label-button",
    require("./components/label/assign/Label.vue").default
);

Vue.component(
    "manage-products",
    require("./components/product/ManageProducts.vue").default
);

Vue.component(
    "manage-product-gallery",
    require("./components/product/ManageGallery.vue").default
);
Vue.component(
    "manage-prices-sizes",
    require("./components/product/price/ManagePrice.vue").default
);

Vue.component(
    "manage-orders",
    require("./components/order/ManageOrders.vue").default
);

Vue.component(
    "manage-user-orders",
    require("./components/order/ManageUserOrders.vue").default
);

Vue.component(
    "manage-pending-proofs",
    require("./components/proof/ManagePendingProofs.vue").default
);

Vue.component(
    "order-selected-shirt-printings",
    require("./components/order/OrderSelectedShirtPrintings.vue").default
);

Vue.component(
    "manage-template-categories",
    require("./components/template/category/ManageTemplateCategories.vue").default
);

Vue.component(
    "manage-templates",
    require("./components/template/ManageTemplates.vue").default
);


Vue.component(
    "thumb-image-blade",
    require("../manage/components/ThumbImage.vue").default
);
