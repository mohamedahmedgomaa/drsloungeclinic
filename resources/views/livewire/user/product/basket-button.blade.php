<div class="cart">
    <a class="nav-icon position-relative text-decoration-none" href="{{ route('user.cart') }}" style="font-size: 25px;margin: 0 20px;">
        <i class="fas fa-shopping-cart" style="padding-top: 10px;color: #000;"></i>
        <span
            class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark" style="font-size: 12px">{{ $this->qty }}</span>
    </a>
</div>
