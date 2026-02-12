
/**
 * Handles form submissions to Google Sheets via Apps Script
 */

// REPLACE THIS WITH YOUR DEPLOYED GOOGLE APPS SCRIPT WEB APP URL
const SCRIPT_URL = 'https://script.google.com/macros/s/AKfycbwebntkuIBkpiYVWfdudAqh85TP2gB-snMU2KL5vkZRPWvxiyI38p_vH3mX0Ta7Ltog/exec';

async function submitToSheet(event, formName) {
    event.preventDefault();

    const form = event.target;
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalBtnText = submitBtn.innerHTML;

    // 1. Show Loading State
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
    submitBtn.disabled = true;

    // 2. Collect Data
    const formData = new FormData(form);
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });

    // Add extra metadata (only what's needed for the script logic, not columns)
    data['formName'] = formName;
    // timestamp is now handled by the Google Script, so we don't send it to avoid duplicates
    // data['timestamp'] = new Date().toISOString();

    // 3. Robust Fix: Use URL Parameters instead of JSON Body
    // This is much more reliable for simple Google Script Web Apps
    const params = new URLSearchParams(data);

    try {
        const response = await fetch(SCRIPT_URL, {
            method: 'POST',
            body: params, // Send as form data, not JSON
            mode: 'no-cors',
            headers: {
                // No specific content-type needed, fetch handles it for params
            }
        });

        // Success (Assumed in no-cors)
        console.log('Request sent via form-urlencoded');
        alert(`Thank you! Your ${formName} request has been submitted successfully.`);
        form.reset();

    } catch (error) {
        console.error('Error!', error.message);
        alert('There was a problem submitting your request. Please try again or contact us directly.');
    } finally {
        // 5. Reset Button
        submitBtn.innerHTML = originalBtnText;
        submitBtn.disabled = false;
    }
}
