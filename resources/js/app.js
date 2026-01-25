import './bootstrap';
import $ from 'jquery';
import Swal from 'sweetalert2';
import { user } from './modules/user.js';
import { api } from './modules/api.js';

window.user = user;
window.api = api;

const opPages = ['index', 'barcode_test', 'grading', 'reports', 'report', 'inventory', 'qc', 'audit', 'location', 'license'];
const shipPages = ['shipping', 'BOL', 'receiving', 'fulfill', 'create', 'pick'].concat(opPages);
const techPages = ['A3', 'qc_station', 'qc_final'].concat(opPages);
const qcPages = ['qc_station', 'qc_final'].concat(opPages);

const subDirectories = ['shipping', 'qc', 'audit', 'admin', 'reports', 'test'];
const isSubdirectory = subDirectories.some(dir => window.location.pathname.toLowerCase().includes(`/${dir}/`));

const pageGroups = {
    admin: [...new Set([...opPages, ...shipPages, ...techPages, ...qcPages])],
    lead: [...new Set([...opPages, ...shipPages, ...techPages, ...qcPages])],
    manager: [...new Set([...opPages, ...shipPages, ...techPages, ...qcPages])],
    op: opPages, ship: shipPages, tech: techPages, qc: qcPages
};


$(async () => {
    try {
        api.init();
        // const status = await checkLoginStatus();
        // if (!status ) throw new Error("User not logged in");
    } catch (e) {
        console.error("API Initialization Error:", e);
    }
    document.body.classList.add('loaded');
});

async function checkLoginStatus() {
    try {
        const response = await $.ajax({
            url: api.admin + 'checkLogin',
            method: 'POST',
            data: {}
        });
    } catch (err) {
        console.error("Login Check Error:", err);
    }
}