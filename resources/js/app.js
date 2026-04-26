import './bootstrap';
import.meta.glob([
    '../fonts/**',
]);

function copyToClipboard(content) {
    navigator.clipboard.writeText(content).then(r => console.log(r));
}
