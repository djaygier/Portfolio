using System.ComponentModel.DataAnnotations;
using System.IO.Compression;
using System.Net.Mail;
using System.Xml.Linq;
using Introweek.Pages;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.ModelBinding;
using Microsoft.AspNetCore.Mvc.RazorPages;

public class SuccessPage : PageModel
{
    private readonly ILogger<PrivacyModel> _logger;

    public SuccessPage(ILogger<PrivacyModel> logger)
    {
        _logger = logger;
    }

    public void OnGet()
    {
    }
}
