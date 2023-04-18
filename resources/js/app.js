import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';
import Focus from '@alpinejs/focus'
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm'
import NotificationsAlpinePlugin from '../../vendor/filament/notifications/dist/module.esm'
import AlpineFloatingUI from '@awcodes/alpine-floating-ui'

Alpine.plugin(Focus)
Alpine.plugin(FormsAlpinePlugin)
Alpine.plugin(NotificationsAlpinePlugin)
Alpine.plugin(AlpineFloatingUI)

window.Alpine = Alpine;

Alpine.start();
