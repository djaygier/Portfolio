using System.ComponentModel.DataAnnotations;
using System.IO.Compression;
using System.Net.Mail;
using System.Xml.Linq;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.ModelBinding;
using Microsoft.AspNetCore.Mvc.RazorPages;

public class CustomValidationModel : PageModel
{
    [BindProperty]
    public FormData? FormData { get; set; }

    public void OnGet()
    {
    }

    public bool IsValid(string emailaddress)
    {
        try
        {
            MailAddress m = new MailAddress(emailaddress);

            return true;
        }
        catch (FormatException)
        {
            return false;
        }
    }

    public async Task<IActionResult> OnPostAsync()
    {
        if (!ModelState.IsValid)
        {
            return Page();
        }

        if (FormData == null) {
            ModelState.AddModelError("FormData.Name", "Niks ingevuld");
            return Page();
        }

        if (FormData.Name == null)
        {
            ModelState.AddModelError("FormData.Name", "Vul een naam in");
            return Page();
        }

        if (FormData.Surname == null)
        {
            ModelState.AddModelError("FormData.Surname", "Vul een achternaam in");
            return Page();
        }

        if (FormData.Email == null)
        {
            ModelState.AddModelError("FormData.Email", "Vul een email in");
            return Page();
        }


        if (!IsValid(FormData.Email))
        {
            ModelState.AddModelError("FormData.Email", "Vul een geldig email in");
            return Page();
        }

        return RedirectToPage("/Success");
    }
}

public class FormData
{
    public String? Name { get; set; }
    public String? Surname { get; set; }
    public String? Email { get; set; }
}
