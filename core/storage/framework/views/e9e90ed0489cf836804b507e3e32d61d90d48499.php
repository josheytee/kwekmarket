<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">

  <ul class="app-menu">
    <li><a class="app-menu__item <?php if(request()->path() == 'admin/dashboard'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.dashboard')); ?>"><i class="app-menu__icon fas fa-tachometer-alt"></i><span class="app-menu__label">Dashboard</span></a></li>

    <li class="treeview
    <?php if(request()->path() == 'admin/generalSetting'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/EmailSetting'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/SmsSetting'): ?>
      is-expanded
    <?php endif; ?>">
      <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-globe"></i><span class="app-menu__label">Website Control</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if(request()->path() == 'admin/generalSetting'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.GenSetting')); ?>"><i class="icon far fa-circle"></i> General Setting</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/EmailSetting'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.EmailSetting')); ?>" rel="noopener"><i class="icon far fa-circle"></i> Email Setting</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/SmsSetting'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.SmsSetting')); ?>"><i class="icon far fa-circle"></i> SMS Setting</a></li>
      </ul>
    </li>

    <li><a class="app-menu__item <?php if(request()->path() == 'admin/charge/index'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.charge.index')); ?>"><i class="app-menu__icon fas fa-money-bill-alt"></i><span class="app-menu__label">Charge Settings</span></a></li>

    <li><a class="app-menu__item <?php if(request()->path() == 'admin/coupon/index'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.coupon.index')); ?>"><i class="app-menu__icon fas fa-dollar-sign"></i><span class="app-menu__label">Coupon Settings</span></a></li>

    <li><a class="app-menu__item <?php if(request()->path() == 'admin/category/index' || request()->is('admin/subcategory/*')): ?> active <?php endif; ?>" href="<?php echo e(route('admin.category.index')); ?>"><i class="app-menu__icon fab fa-buromobelexperte"></i><span class="app-menu__label">Category Management</span></a></li>

    <li><a class="app-menu__item
    <?php if(request()->path() == 'admin/productattr/index'): ?> active
    <?php elseif(request()->is('admin/options/*/index')): ?> active
    <?php endif; ?>" href="<?php echo e(route('admin.productattr.index')); ?>"><i class="app-menu__icon fab fa-product-hunt"></i><span class="app-menu__label">Product Attributes</span></a></li>

    <li><a class="app-menu__item <?php if(request()->path() == 'admin/packages'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.package')); ?>"><i class="app-menu__icon fa fa-gift"></i><span class="app-menu__label">Packages</span></a></li>


      <li class="treeview
      <?php if(request()->path() == 'admin/vendors/all'): ?>
        is-expanded
      <?php elseif(request()->path() == 'admin/vendors/pending'): ?>
          is-expanded
      <?php elseif(request()->path() == 'admin/vendors/accepted'): ?>
          is-expanded
      <?php elseif(request()->path() == 'admin/vendors/rejected'): ?>
          is-expanded
      <?php endif; ?>">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-industry"></i><span class="app-menu__label">Vendor Requests</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item <?php if(request()->path() == 'admin/vendors/all'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.vendors.all')); ?>"><i class="icon far fa-circle"></i> All</a></li>
          <li><a class="treeview-item <?php if(request()->path() == 'admin/vendors/pending'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.vendors.pending')); ?>"><i class="icon far fa-circle"></i> Pending</a></li>
          <li><a class="treeview-item <?php if(request()->path() == 'admin/vendors/accepted'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.vendors.accepted')); ?>"><i class="icon far fa-circle"></i> Accepted</a></li>
          <li><a class="treeview-item <?php if(request()->path() == 'admin/vendors/rejected'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.vendors.rejected')); ?>"><i class="icon far fa-circle"></i> Rejected</a></li>
        </ul>
      </li>

      <li class="treeview
      <?php if(request()->path() == 'admin/flashsale/times'): ?>
        is-expanded
      <?php elseif(request()->path() == 'admin/flashsale/all'): ?>
          is-expanded
      <?php elseif(request()->path() == 'admin/flashsale/pending'): ?>
          is-expanded
      <?php elseif(request()->path() == 'admin/flashsale/accepted'): ?>
          is-expanded
      <?php elseif(request()->path() == 'admin/flashsale/rejected'): ?>
          is-expanded
      <?php endif; ?>">
        <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-hand-holding-usd"></i><span class="app-menu__label">Flash Sale</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item <?php if(request()->path() == 'admin/flashsale/times'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.flashsale.times')); ?>"><i class="icon far fa-circle"></i> Time Setup</a></li>
          <li><a class="treeview-item <?php if(request()->path() == 'admin/flashsale/all'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.flashsale.all')); ?>"><i class="icon far fa-circle"></i> All Flashsales</a></li>
          <li><a class="treeview-item <?php if(request()->path() == 'admin/flashsale/pending'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.flashsale.pending')); ?>"><i class="icon far fa-circle"></i> Pending Flashsales</a></li>
          <li><a class="treeview-item <?php if(request()->path() == 'admin/flashsale/accepted'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.flashsale.accepted')); ?>"><i class="icon far fa-circle"></i> Accepted Flashsales</a></li>
          <li><a class="treeview-item <?php if(request()->path() == 'admin/flashsale/rejected'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.flashsale.rejected')); ?>"><i class="icon far fa-circle"></i> Rejected Flashsales</a></li>
        </ul>
      </li>



    <li class="treeview
    <?php if(request()->path() == 'admin/orders/all'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/orders/confirmation/pending'): ?>
        is-expanded
    <?php elseif(request()->path() == 'admin/orders/confirmation/accepted'): ?>
        is-expanded
    <?php elseif(request()->path() == 'admin/orders/confirmation/rejected'): ?>
        is-expanded
    <?php elseif(request()->path() == 'admin/orders/delivery/pending'): ?>
        is-expanded
    <?php elseif(request()->path() == 'admin/orders/delivery/inprocess'): ?>
        is-expanded
    <?php elseif(request()->path() == 'admin/orders/delivered'): ?>
        is-expanded
    <?php elseif(request()->path() == 'admin/orders/cashondelivery'): ?>
        is-expanded
    <?php elseif(request()->path() == 'admin/orders/advance'): ?>
        is-expanded
    <?php endif; ?>">
      <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Orders</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if(request()->path() == 'admin/orders/all'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.orders.all')); ?>"><i class="icon far fa-circle"></i> All</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/orders/confirmation/pending'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.orders.cPendingOrders')); ?>"><i class="icon far fa-circle"></i> Pending</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/orders/confirmation/accepted'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.orders.cAcceptedOrders')); ?>"><i class="icon far fa-circle"></i> Accepted</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/orders/confirmation/rejected'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.orders.cRejectedOrders')); ?>"><i class="icon far fa-circle"></i> Rejected</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/orders/delivery/pending'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.orders.pendingDelivery')); ?>"><i class="icon far fa-circle"></i> Delivery Pending</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/orders/delivery/inprocess'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.orders.pendingInprocess')); ?>"><i class="icon far fa-circle"></i> Delivery Inprocess</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/orders/delivered'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.orders.delivered')); ?>"><i class="icon far fa-circle"></i> Delivered</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/orders/cashondelivery'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.orders.cashOnDelivery')); ?>"><i class="icon far fa-circle"></i> Cash on Delivery</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/orders/advance'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.orders.advance')); ?>"><i class="icon far fa-circle"></i> Advance Paid</a></li>
      </ul>
    </li>


    <li class="treeview
    <?php if(request()->path() == 'admin/comments'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/complains'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/suggestions'): ?>
      is-expanded
    <?php endif; ?>">
      <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-comments"></i><span class="app-menu__label">Comments</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if(request()->path() == 'admin/comments'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.comments.all')); ?>"><i class="icon far fa-circle"></i> All</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/complains'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.complains')); ?>"><i class="icon far fa-circle"></i> Complains</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/suggestions'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.suggestions')); ?>"><i class="icon far fa-circle"></i> Suggestions</a></li>
      </ul>
    </li>


    <li class="treeview
    <?php if(request()->path() == 'admin/refunds/all'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/refunds/pending'): ?>
        is-expanded
    <?php elseif(request()->path() == 'admin/refunds/rejected'): ?>
        is-expanded
    <?php elseif(request()->path() == 'admin/refunds/accepted'): ?>
        is-expanded
    <?php endif; ?>">
      <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-undo"></i><span class="app-menu__label">Refund Request</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if(request()->path() == 'admin/refunds/all'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.refunds.all')); ?>"><i class="icon far fa-circle"></i> All</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/refunds/pending'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.refunds.pending')); ?>"><i class="icon far fa-circle"></i> Pending</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/refunds/accepted'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.refunds.accepted')); ?>"><i class="icon far fa-circle"></i> Accepted</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/refunds/rejected'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.refunds.rejected')); ?>"><i class="icon far fa-circle"></i> Rejected</a></li>
      </ul>
    </li>


    <li class="treeview
    <?php if(request()->path() == 'admin/userManagement/allUsers'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/userManagement/bannedUsers'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/userManagement/verifiedUsers'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/userManagement/mobileUnverifiedUsers'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/userManagement/emailUnverifiedUsers'): ?>
      is-expanded
    <?php elseif(request()->is('admin/userManagement/userDetails/*')): ?>
      is-expanded
    <?php elseif(request()->is('admin/userManagement/emailToUser/*')): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/userManagement/allUsersSearchResult'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/userManagement/bannedUsersSearchResult'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/userManagement/verUsersSearchResult'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/userManagement/mobileUnverifiedUsersSearchResult'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/userManagement/emailUnverifiedUsersSearchResult'): ?>
      is-expanded
    <?php endif; ?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Users Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if(request()->path() == 'admin/userManagement/allUsers' || request()->path() == 'admin/userManagement/allUsersSearchResult'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.allUsers')); ?>"><i class="icon far fa-circle"></i> All Users</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/userManagement/bannedUsers' || request()->path() == 'admin/userManagement/bannedUsersSearchResult'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.bannedUsers')); ?>"><i class="icon far fa-circle"></i> Banned Users</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/userManagement/verifiedUsers' || request()->path() == 'admin/userManagement/verUsersSearchResult'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.verifiedUsers')); ?>"><i class="icon far fa-circle"></i> Verified Users</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/userManagement/mobileUnverifiedUsers' || request()->path() == 'admin/userManagement/mobileUnverifiedUsersSearchResult'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.mobileUnverifiedUsers')); ?>"><i class="icon far fa-circle"></i> Mobile Unverified Users</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/userManagement/emailUnverifiedUsers' || request()->path() == 'admin/userManagement/emailUnverifiedUsersSearchResult'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.emailUnverifiedUsers')); ?>"><i class="icon far fa-circle"></i> Email Unverified Users</a></li>
      </ul>
    </li>


    <li class="treeview
    <?php if(request()->path() == 'admin/vendorManagement/allVendors'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/vendorManagement/bannedVendors'): ?>
      is-expanded
    <?php elseif(request()->is('admin/vendorManagement/emailToVendor/*')): ?>
      is-expanded
    <?php elseif(request()->is('admin/vendorManagement/addSubtractBalance/*')): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/vendorManagement/allVendorsSearchResult'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/vendorManagement/bannedVendorsSearchResult'): ?>
      is-expanded
    <?php endif; ?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Vendors Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if(request()->path() == 'admin/vendorManagement/allVendors' || request()->path() == 'admin/vendorManagement/allVendorsSearchResult'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.allVendors')); ?>"><i class="icon far fa-circle"></i> All Vendors</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/vendorManagement/bannedVendors' || request()->path() == 'admin/vendorManagement/bannedVendorsSearchResult'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.bannedVendors')); ?>"><i class="icon far fa-circle"></i> Banned Vendors</a></li>
      </ul>
    </li>

    <li><a class="app-menu__item <?php if(request()->path() == 'admin/subscribers'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.subscribers')); ?>"><i class="app-menu__icon fas fa-newspaper"></i><span class="app-menu__label">Subscribers</span></a></li>

    <li><a class="app-menu__item <?php if(request()->path() == 'admin/gateways'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.gateways')); ?>"><i class="app-menu__icon fab fa-cc-mastercard"></i><span class="app-menu__label">Gateways</span></a></li>


    <li class="treeview
    <?php if(request()->path() == 'admin/deposit/pending'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/deposit/acceptedRequests'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/deposit/rejectedRequests'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/deposit/depositLog'): ?>
      is-expanded
    <?php endif; ?>">
      <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-download"></i><span class="app-menu__label">Deposit</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if(request()->path() == 'admin/deposit/pending'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.deposit.pending')); ?>"><i class="icon far fa-circle"></i> Pending Request</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/deposit/acceptedRequests'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.deposit.acceptedRequests')); ?>" rel="noopener"><i class="icon far fa-circle"></i> Accepted Request</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/deposit/rejectedRequests'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.deposit.rejectedRequests')); ?>"><i class="icon far fa-circle"></i> Rejected Request</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/deposit/depositLog'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.deposit.depositLog')); ?>"><i class="icon far fa-circle"></i> Deposit Log</a></li>
      </ul>
    </li>


    <li class="treeview
    <?php if(request()->path() == 'admin/withdrawLog'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/withdrawMethod'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/successLog'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/refundedLog'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/pendingLog'): ?>
      is-expanded
    <?php endif; ?>">
      <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-upload"></i><span class="app-menu__label">Withdraw Money</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if(request()->path() == 'admin/withdrawMethod'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.withdrawMethod')); ?>"><i class="icon far fa-circle"></i> Withdraw Method</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/withdrawLog'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.withdrawLog')); ?>" rel="noopener"><i class="icon far fa-circle"></i> Withdraw Log</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/pendingLog'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.withdrawMoney.pendingLog')); ?>"><i class="icon far fa-circle"></i> Pending Requests Log</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/successLog'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.withdrawMoney.successLog')); ?>"><i class="icon far fa-circle"></i> Success Log</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/refundedLog'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.withdrawMoney.refundedLog')); ?>"><i class="icon far fa-circle"></i> Refunded Log</a></li>
      </ul>
    </li>

    <li><a class="app-menu__item <?php if(request()->path() == 'admin/trxlog'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.trxLog')); ?>"><i class="app-menu__icon fas fa-exchange-alt"></i><span class="app-menu__label">Transaction Log</span></a></li>


    <li class="treeview
    <?php if(request()->path() == 'admin/interfaceControl/logoIcon/index'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/interfaceControl/partner/index'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/interfaceControl/slider/index'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/interfaceControl/contact/index'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/interfaceControl/support/index'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/interfaceControl/social/index'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/interfaceControl/footer/index'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/interfaceControl/logintext/index'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/interfaceControl/registertext/index'): ?>
      is-expanded
    <?php endif; ?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-desktop"></i><span class="app-menu__label">Interface Control</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if(request()->path() == 'admin/interfaceControl/logoIcon/index'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.logoIcon.index')); ?>"><i class="icon far fa-circle"></i> Logo+Icon Setting</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/interfaceControl/support/index'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.support.index')); ?>"><i class="icon far fa-circle"></i> Support Informations</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/interfaceControl/partner/index'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.partner.index')); ?>"><i class="icon far fa-circle"></i> Partners</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/interfaceControl/slider/index'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.slider.index')); ?>"><i class="icon far fa-circle"></i> Slider Settings</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/interfaceControl/contact/index'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.contact.index')); ?>"><i class="icon far fa-circle"></i> Contact Informations</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/interfaceControl/social/index'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.social.index')); ?>"><i class="icon far fa-circle"></i> Social Links Setting</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/interfaceControl/logintext/index'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.logintext.index')); ?>"><i class="icon far fa-circle"></i> Login Text</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/interfaceControl/registertext/index'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.registertext.index')); ?>"><i class="icon far fa-circle"></i> Register Text</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/interfaceControl/footer/index'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.footer.index')); ?>"><i class="icon far fa-circle"></i> Footer Text</a></li>
      </ul>
    </li>


    <li class="treeview
    <?php if(request()->path() == 'admin/policy/refund/index'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/tos/index'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/policy/replacement/index'): ?>
      is-expanded
    <?php elseif(request()->path() == 'admin/privacy/index'): ?>
      is-expanded
    <?php endif; ?>">
      <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-clipboard-list"></i><span class="app-menu__label">Policy</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item <?php if(request()->path() == 'admin/policy/refund/index'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.refund.index')); ?>"><i class="icon far fa-circle"></i> Refund Policy</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/policy/replacement/index'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.replacement.index')); ?>"><i class="icon far fa-circle"></i> Replacement Policy</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/tos/index'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.tos.index')); ?>"><i class="icon far fa-circle"></i> Terms & Conditions</a></li>
        <li><a class="treeview-item <?php if(request()->path() == 'admin/privacy/index'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.privacy.index')); ?>"><i class="icon far fa-circle"></i> Privacy Policy</a></li>
      </ul>
    </li>


    <li><a class="app-menu__item <?php if(request()->path() == 'admin/menuManager/index'): ?> active <?php endif; ?>" href="<?php echo e(route('admin.menuManager.index')); ?>"><i class="app-menu__icon fa fa-bars"></i><span class="app-menu__label">Menu Management</span></a></li>


    <li><a class="app-menu__item
      <?php if(request()->path() == 'admin/Ad/index'): ?>
        active
      <?php elseif(request()->path() == 'admin/Ad/create'): ?>
        active
      <?php endif; ?>" href="<?php echo e(route('admin.ad.index')); ?>"><i class="app-menu__icon fab fa-buysellads"></i> <span class="app-menu__label"> Advertisement</span></a></li>

  </ul>
</aside>
