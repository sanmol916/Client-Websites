/* ============================================================
   Shashank Tax Consultant — Service page content
   Each entry powers service.html?s=<slug>
   ============================================================ */
window.SERVICES = {

    "gst": {
        title: "GST Registration & Filing",
        icon: "M4 2h16a1 1 0 011 1v18l-4-2-4 2-4-2-4 2V3a1 1 0 011-1zm3 6h10V6H7v2zm0 4h10v-2H7v2zm0 4h7v-2H7v2z",
        tagline: "End-to-end GST registration and timely, accurate return filing — GSTR-1, GSTR-3B, annual returns and reconciliation.",
        about: "GST compliance is a continuous obligation for every registered taxpayer. Missing deadlines or filing incorrect returns can lead to interest charges, penalties, and loss of input tax credit. We handle your GST registration, monthly and quarterly filings, reconciliation, and annual returns — ensuring everything is accurate and on time, every time.",
        whoNeeds: "Any business with turnover above the GST threshold, inter-state suppliers, e-commerce sellers, and voluntary registrants. Regular taxpayers, composition dealers, and those under special schemes all have periodic return obligations.",
        whyImportant: "Timely GST filing avoids late fees of ₹50/day (₹20 for NIL returns), protects your input tax credit eligibility, and keeps your business in good standing with the department — essential for smooth operations and vendor relationships.",
        benefits: [
            { t: "On-Time Filing", d: "Every GSTR-1, GSTR-3B and annual return filed before the due date, without fail." },
            { t: "ITC Optimization", d: "Maximize input tax credit through proper matching with GSTR-2A/2B and reconciliation." },
            { t: "Error-Free Returns", d: "A reviewed process that eliminates mistakes which could trigger scrutiny or notices." },
            { t: "Registration Support", d: "Fast, hassle-free new GST registration and amendments to existing certificates." },
            { t: "Notice Handling", d: "Expert help responding to GST notices, queries, and assessment proceedings." },
            { t: "Real-Time Updates", d: "Stay informed about filing status, due dates, and the latest compliance changes." }
        ],
        documents: [
            "PAN and Aadhaar of the proprietor / partners / directors",
            "Business registration proof / partnership deed / incorporation certificate",
            "Address proof of the principal place of business",
            "Bank account statement or cancelled cheque",
            "Sales and purchase invoices for the filing period",
            "Digital signature (DSC) for companies and LLPs",
            "Photographs of the authorised signatory"
        ],
        process: [
            { t: "Data Collection", d: "We gather your invoices, credit/debit notes, and transaction data for the period." },
            { t: "Reconciliation", d: "Match purchase data with GSTR-2A/2B auto-populated data to ensure ITC accuracy." },
            { t: "Return Preparation", d: "Prepare GSTR-1 and GSTR-3B with a detailed review before submission." },
            { t: "Filing & Payment", d: "File on the GST portal and compute tax liability for timely payment." }
        ],
        faqs: [
            { q: "How often do I need to file GST returns?", a: "Most regular taxpayers file GSTR-1 and GSTR-3B monthly, while small taxpayers under the QRMP scheme file quarterly with monthly tax payment. We'll set the right schedule for you." },
            { q: "What happens if I miss a GST deadline?", a: "Late filing attracts a fee of ₹50/day (₹20 for NIL returns) plus interest on any unpaid tax. We help you file promptly and minimise any liability." },
            { q: "Can you register my new business for GST?", a: "Yes. We handle the entire registration end-to-end and typically obtain your GSTIN within a few working days once documents are ready." },
            { q: "Do you help with GST notices?", a: "Absolutely — we draft and file responses to notices, and represent your case during assessments and queries." }
        ]
    },

    "income-tax": {
        title: "Income Tax Filing & Planning",
        icon: "M3 3h18v4H3V3zm0 6h18v12H3V9zm2 2v8h6v-8H5zm8 0v2h6v-2h-6zm0 4v2h6v-2h-6z",
        tagline: "Strategic ITR filing and proactive tax planning for individuals and businesses — maximizing savings while staying fully compliant.",
        about: "Filing your income tax return correctly is about more than meeting a deadline — it's an opportunity to legally reduce your tax burden. We prepare and file returns for salaried individuals, professionals, and businesses, and build a year-round tax plan that helps you keep more of what you earn.",
        whoNeeds: "Salaried employees, freelancers and professionals, business owners, and anyone with capital gains, rental, or foreign income. If your income crosses the basic exemption limit, filing is mandatory — and beneficial even below it.",
        whyImportant: "Accurate, timely ITR filing avoids penalties and interest under Sections 234A/B/C, enables loan and visa approvals, allows carry-forward of losses, and ensures faster refunds. Good planning can save you significant tax legally.",
        benefits: [
            { t: "Maximum Savings", d: "We identify every eligible deduction and exemption under 80C, 80D, HRA and more." },
            { t: "Regime Comparison", d: "Old vs new tax regime analysis so you pay the lower tax legally." },
            { t: "Accurate Filing", d: "Reviewed returns that match Form 26AS and AIS to prevent mismatches and notices." },
            { t: "Capital Gains Expertise", d: "Correct treatment of shares, mutual funds, and property gains with indexation." },
            { t: "Advance Tax Planning", d: "Timely advance-tax estimates to avoid interest and year-end surprises." },
            { t: "Refund Follow-Up", d: "We track your refund status and resolve any processing delays with the department." }
        ],
        documents: [
            "PAN and Aadhaar card",
            "Form 16 / salary slips (for salaried individuals)",
            "Form 26AS and Annual Information Statement (AIS)",
            "Bank statements and interest certificates",
            "Investment proofs for deductions (80C, 80D, etc.)",
            "Capital gains statements (shares, mutual funds, property)",
            "Details of other income (rent, freelance, business)"
        ],
        process: [
            { t: "Document Review", d: "We collect your income details and cross-check with 26AS and AIS." },
            { t: "Tax Computation", d: "Calculate liability under both regimes and apply all eligible deductions." },
            { t: "Return Preparation", d: "Prepare the correct ITR form with a thorough accuracy review." },
            { t: "Filing & E-Verification", d: "File the return and complete e-verification, then track your refund." }
        ],
        faqs: [
            { q: "Which tax regime should I choose?", a: "It depends on your deductions and income mix. We compare both the old and new regimes for your situation and recommend whichever results in lower tax." },
            { q: "What is the penalty for late ITR filing?", a: "A late fee up to ₹5,000 under Section 234F may apply, plus interest on unpaid tax. Filing on time also lets you carry forward losses." },
            { q: "Do freelancers and professionals need to file?", a: "Yes — if income exceeds the exemption limit. We also advise on presumptive taxation under 44ADA where beneficial." },
            { q: "How long do refunds take?", a: "Refunds are usually processed within a few weeks of e-verification. We monitor the status and follow up on any delays." }
        ]
    },

    "accounting": {
        title: "Accounting & Bookkeeping",
        icon: "M3 13h2v7H3v-7zm4-6h2v13H7V7zm4 3h2v10h-2V10zm4-6h2v16h-2V4zm4 9h2v7h-2v-7z",
        tagline: "Accurate day-to-day bookkeeping, financial statement preparation, and MIS reporting so you always know where your business stands.",
        about: "Clean, up-to-date books are the foundation of every well-run business. We maintain your day-to-day accounts, reconcile bank and ledger balances, and prepare financial statements and management reports — giving you a clear, real-time picture of your finances for confident decision-making.",
        whoNeeds: "Small and medium businesses, startups, professionals, and traders who want reliable books without hiring a full in-house team — or who need to clean up and standardise their existing records.",
        whyImportant: "Well-maintained books ensure accurate tax filings, smoother audits, easier access to loans and funding, and better control over cash flow. Disorganised accounts lead to missed deductions, compliance risk, and poor decisions.",
        benefits: [
            { t: "Organised Books", d: "Systematic recording of every transaction in accounting software you can trust." },
            { t: "Bank Reconciliation", d: "Regular matching of bank and book balances to catch errors early." },
            { t: "Financial Statements", d: "Profit & loss, balance sheet, and cash-flow statements prepared on schedule." },
            { t: "MIS Reporting", d: "Clear management reports that highlight trends, margins, and cash position." },
            { t: "Software Setup", d: "Setup and support on Tally, Zoho Books, or your preferred platform." },
            { t: "Audit-Ready Records", d: "Books maintained to standards that make statutory audits fast and painless." }
        ],
        documents: [
            "Sales and purchase invoices",
            "Bank statements for all accounts",
            "Expense bills and vouchers",
            "Previous accounting records or trial balance",
            "Loan and investment statements",
            "Payroll and salary records",
            "GST and TDS return copies"
        ],
        process: [
            { t: "Onboarding", d: "We understand your business, chart of accounts, and reporting needs." },
            { t: "Data Entry", d: "Record and categorise all transactions accurately in your accounting system." },
            { t: "Reconciliation", d: "Reconcile bank, vendor, and customer balances every period." },
            { t: "Reporting", d: "Deliver financial statements and MIS reports for your review." }
        ],
        faqs: [
            { q: "Which accounting software do you work with?", a: "We work with Tally, Zoho Books, QuickBooks, and most popular platforms. We can also recommend and set up the right one for your business." },
            { q: "Can you clean up my backlog of accounts?", a: "Yes — we specialise in bringing neglected or incomplete books up to date and audit-ready." },
            { q: "How often will I get reports?", a: "Typically monthly, but we can provide weekly or on-demand MIS reports depending on your needs." },
            { q: "Is my financial data kept confidential?", a: "Completely. We follow strict confidentiality practices and secure handling of all your records." }
        ]
    },

    "incorporation": {
        title: "Company & LLP Incorporation",
        icon: "M10 2h4a2 2 0 012 2v2h4a2 2 0 012 2v11a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h4V4a2 2 0 012-2zm4 4V4h-4v2h4z",
        tagline: "End-to-end company, LLP, and firm registration with DSC, DIN, name approval, ROC filings, and ongoing statutory compliance.",
        about: "Choosing the right business structure and registering it correctly sets the tone for everything that follows. We handle the complete incorporation process — from name approval and documentation to your certificate of incorporation — and continue to manage your ROC and statutory compliance afterwards.",
        whoNeeds: "Entrepreneurs and founders starting a new venture, partnerships looking to convert to an LLP or company, and existing businesses that need help staying compliant with the Registrar of Companies.",
        whyImportant: "The right structure affects your liability, taxation, fundraising ability, and credibility. Correct incorporation and timely ROC filings protect your limited liability status and avoid heavy penalties for non-compliance.",
        benefits: [
            { t: "Right Structure Advice", d: "Guidance on Pvt Ltd, LLP, OPC, or partnership based on your goals." },
            { t: "End-to-End Filing", d: "DSC, DIN, name approval (RUN/SPICe+), MOA & AOA, and incorporation certificate." },
            { t: "Fast Turnaround", d: "Efficient, well-prepared applications that reduce back-and-forth with the ROC." },
            { t: "Post-Incorporation", d: "PAN, TAN, bank account support, and initial statutory registrations." },
            { t: "Ongoing Compliance", d: "Annual ROC filings, board resolutions, and statutory registers maintained." },
            { t: "Transparent Pricing", d: "Clear, upfront quotes covering government fees and professional charges." }
        ],
        documents: [
            "PAN and Aadhaar of all directors / partners",
            "Passport-size photographs",
            "Identity proof (Voter ID / Passport / Driving Licence)",
            "Address proof (bank statement / utility bill)",
            "Registered office address proof and rent agreement / NOC",
            "Proposed company / LLP names (2–3 options)",
            "Digital signature (if already available)"
        ],
        process: [
            { t: "Consultation", d: "We recommend the best structure and reserve your preferred name." },
            { t: "Documentation", d: "Obtain DSC and DIN, and prepare MOA, AOA, or the LLP agreement." },
            { t: "Filing", d: "Submit the SPICe+ / FiLLiP application to the Registrar of Companies." },
            { t: "Incorporation", d: "Receive your certificate, PAN, and TAN — ready to start operations." }
        ],
        faqs: [
            { q: "Which is better — Private Limited or LLP?", a: "A Private Limited company suits businesses seeking investment and scale, while an LLP is simpler and cost-effective for professional firms. We advise based on your plans." },
            { q: "How long does incorporation take?", a: "Typically 7–12 working days once all documents are in order, subject to ROC processing times." },
            { q: "Do you handle compliance after registration?", a: "Yes — we manage annual filings, statutory registers, and all ongoing ROC requirements." },
            { q: "What are the minimum requirements?", a: "A Private Limited company needs at least 2 directors and 2 shareholders; an LLP needs at least 2 designated partners. We'll guide you through the specifics." }
        ]
    },

    "tds": {
        title: "TDS / TCS Compliance",
        icon: "M2 5a2 2 0 012-2h4l2 3h10a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm10 4l-4 4h3v3h2v-3h3l-4-4z",
        tagline: "Timely TDS/TCS deduction, deposit, and return filing — keeping you fully compliant and penalty-free.",
        about: "TDS and TCS obligations carry strict deadlines and steep penalties for errors. We manage the full cycle for you — correct deduction, timely deposit of challans, accurate quarterly return filing, and issuing TDS certificates — so you never face avoidable interest or late fees.",
        whoNeeds: "Businesses and individuals making payments like salaries, rent, professional fees, contractor payments, or commissions above threshold limits, and sellers/collectors liable to collect TCS.",
        whyImportant: "Late deduction or deposit attracts interest of 1–1.5% per month, and late return filing costs ₹200/day. Incorrect TDS also causes credit mismatches for your deductees. Proper compliance protects you and your vendors.",
        benefits: [
            { t: "Correct Deduction", d: "Right TDS/TCS rates and sections applied to every payment type." },
            { t: "Timely Deposits", d: "Challans deposited before due dates to avoid interest and penalties." },
            { t: "Quarterly Returns", d: "Accurate filing of 24Q, 26Q, 27Q, and 27EQ with a review process." },
            { t: "Form 16 / 16A", d: "Timely generation and delivery of TDS certificates to deductees." },
            { t: "Correction Statements", d: "Prompt handling of defaults, mismatches, and revised returns." },
            { t: "Lower-Deduction Support", d: "Assistance with lower or nil deduction certificates where applicable." }
        ],
        documents: [
            "TAN of the deductor",
            "PAN of all deductees",
            "Details of payments and TDS/TCS deducted",
            "Challan details of tax deposited",
            "Previous TDS return acknowledgements",
            "Salary details for 24Q (if applicable)",
            "Vendor invoices and agreements"
        ],
        process: [
            { t: "Payment Review", d: "Identify which payments attract TDS/TCS and the applicable rates." },
            { t: "Deposit", d: "Prepare and deposit challans within the statutory due dates." },
            { t: "Return Filing", d: "File quarterly returns accurately with PAN-wise deduction details." },
            { t: "Certificates", d: "Generate and issue Form 16 / 16A to all deductees." }
        ],
        faqs: [
            { q: "What is the due date for TDS payment?", a: "Generally the 7th of the following month (30th April for March deductions). We track every deadline for you." },
            { q: "What if TDS was deducted at the wrong rate?", a: "We file correction statements to fix rate or PAN errors and resolve any resulting defaults with the department." },
            { q: "Do you issue TDS certificates?", a: "Yes — we generate Form 16 for salaries and Form 16A for other payments and deliver them to your deductees on time." },
            { q: "Is TAN mandatory for TDS?", a: "Yes, a valid TAN is required to deduct and deposit TDS. We can help you obtain one if you don't already have it." }
        ]
    },

    "msme": {
        title: "MSME & Startup Registration",
        icon: "M11 2v2.06A8 8 0 004.06 11H2v2h2.06A8 8 0 0011 19.94V22h2v-2.06A8 8 0 0019.94 13H22v-2h-2.06A8 8 0 0013 4.06V2h-2zm1 4a6 6 0 110 12 6 6 0 010-12zm0 3a3 3 0 100 6 3 3 0 000-6z",
        tagline: "Tailored solutions for startups and MSMEs — Udyam registration, Startup India recognition, and compliance from day one.",
        about: "Startups and small businesses qualify for valuable government benefits — but only with the right registrations in place. We help you obtain Udyam (MSME) registration, Startup India recognition, and other approvals that unlock subsidies, tax benefits, and easier access to credit.",
        whoNeeds: "New founders, small manufacturers and service providers, traders, and growing businesses that want to access MSME schemes, priority-sector lending, and startup incentives.",
        whyImportant: "MSME and Startup registrations unlock collateral-free loans, interest subsidies, protection against delayed payments, tax exemptions, and preference in government tenders — significant advantages for early-stage and small businesses.",
        benefits: [
            { t: "Udyam Registration", d: "Quick, accurate MSME registration to access priority-sector benefits." },
            { t: "Startup India Recognition", d: "DPIIT recognition to unlock tax holidays and funding eligibility." },
            { t: "Scheme Guidance", d: "Advice on subsidies, grants, and loan schemes you qualify for." },
            { t: "Faster Credit Access", d: "Documentation support for collateral-free and subsidised loans." },
            { t: "Delayed-Payment Protection", d: "Guidance on MSME rights against delayed buyer payments." },
            { t: "End-to-End Support", d: "From eligibility check to certificate — we handle the paperwork." }
        ],
        documents: [
            "Aadhaar of the proprietor / partner / director",
            "PAN of the business and owner",
            "Business address proof",
            "Bank account details",
            "Details of investment in plant, machinery, or equipment",
            "Incorporation / partnership documents (if applicable)",
            "Brief description of business activity"
        ],
        process: [
            { t: "Eligibility Check", d: "We assess which registrations and schemes your business qualifies for." },
            { t: "Documentation", d: "Collect and verify the required documents and business details." },
            { t: "Application", d: "File Udyam and/or Startup India applications accurately." },
            { t: "Certificate & Guidance", d: "Deliver your certificate and advise on benefits to claim." }
        ],
        faqs: [
            { q: "Is Udyam registration free?", a: "The government portal charges no fee. We charge a small professional fee for accurate, hassle-free registration and guidance." },
            { q: "What benefits does MSME registration give?", a: "Access to collateral-free loans, interest subsidies, protection against delayed payments, and preference in government tenders, among others." },
            { q: "Who qualifies as a startup under Startup India?", a: "Entities up to 10 years old with turnover under ₹100 crore working on innovation or scalable models. We confirm your eligibility before applying." },
            { q: "Can existing businesses register?", a: "Yes — MSME registration is available to existing businesses too, based on their investment and turnover." }
        ]
    },

    "payroll": {
        title: "Payroll & Compliance",
        icon: "M3 3h18v2H3V3zm2 4h14v14H5V7zm2 2v3h4V9H7zm6 0v3h4V9h-4zm-6 5v3h4v-3H7zm6 0v3h4v-3h-4z",
        tagline: "Complete payroll processing with PF, ESI, professional tax, and labour-law compliance — handled accurately and on time.",
        about: "Payroll is more than paying salaries — it involves statutory deductions, filings, and employee compliance that must be exact. We process your payroll end-to-end, manage PF/ESI and professional tax, and keep you compliant with labour laws, so your team is paid correctly and on schedule.",
        whoNeeds: "Businesses with employees — from small teams to growing companies — that want error-free salary processing and full statutory compliance without the administrative burden.",
        whyImportant: "Payroll errors and missed PF/ESI deposits lead to penalties, interest, and unhappy employees. Correct payroll compliance protects your business from labour-law disputes and builds employee trust.",
        benefits: [
            { t: "Accurate Payroll", d: "Precise salary, deduction, and net-pay calculations every cycle." },
            { t: "PF & ESI Management", d: "Registration, monthly contributions, and return filing handled fully." },
            { t: "Professional Tax", d: "Correct PT deduction and payment as per your state's rules." },
            { t: "Payslips & Reports", d: "Digital payslips for employees and clear payroll summaries for you." },
            { t: "Statutory Filings", d: "Timely PF, ESI, and PT returns to keep you compliant." },
            { t: "TDS on Salary", d: "Accurate salary TDS computation and Form 16 at year-end." }
        ],
        documents: [
            "Employee details (PAN, Aadhaar, bank accounts)",
            "Salary structure and CTC breakup",
            "Attendance and leave records",
            "PF and ESI registration details",
            "Previous payroll records (if any)",
            "Investment declarations for TDS",
            "Company PAN, TAN, and registration documents"
        ],
        process: [
            { t: "Setup", d: "Configure salary structures, statutory rates, and employee master data." },
            { t: "Processing", d: "Calculate salaries, deductions, and net pay for the period." },
            { t: "Compliance", d: "Deposit PF, ESI, PT, and TDS, and file the required returns." },
            { t: "Payslips & Reports", d: "Distribute payslips and share payroll reports with you." }
        ],
        faqs: [
            { q: "Is PF and ESI registration mandatory?", a: "PF applies to establishments with 20+ employees and ESI to those with 10+ (varies by state), subject to wage thresholds. We assess your obligations and register you if required." },
            { q: "Can you handle payroll for a small team?", a: "Yes — we support businesses of any size, from a handful of employees upward." },
            { q: "Do employees get payslips?", a: "Yes, we provide clear digital payslips each cycle and Form 16 at year-end." },
            { q: "How do you handle salary TDS?", a: "We compute TDS based on each employee's declarations and projected income, deposit it on time, and issue Form 16." }
        ]
    },

    "advisory": {
        title: "Business & Financial Advisory",
        icon: "M13 2L3 14h7v8l10-12h-7V2z",
        tagline: "Strategic advisory on financial planning, costing, project reports, and growth — backed by expert analysis.",
        about: "Beyond compliance, the right financial advice can transform how your business performs. We work with you on budgeting, costing, cash-flow planning, and project reports — turning your numbers into clear, actionable strategies for sustainable growth and better decisions.",
        whoNeeds: "Business owners planning expansion or funding, startups building projections, and anyone who wants to improve profitability, control costs, or make confident financial decisions.",
        whyImportant: "Sound financial strategy is the difference between reactive firefighting and confident growth. Proper planning improves margins, secures funding, avoids cash crunches, and helps you seize opportunities at the right time.",
        benefits: [
            { t: "Financial Planning", d: "Budgets, forecasts, and cash-flow plans tailored to your goals." },
            { t: "Costing & Pricing", d: "Cost analysis and pricing strategy to protect and grow your margins." },
            { t: "Project Reports", d: "Bankable project reports and CMA data for loans and funding." },
            { t: "Business Structuring", d: "Advice on structure and processes for tax efficiency and scale." },
            { t: "Performance Analysis", d: "Ratio and profitability analysis that reveals what to improve." },
            { t: "Growth Strategy", d: "Practical, data-backed guidance to plan and fund your next stage." }
        ],
        documents: [
            "Latest financial statements (P&L, balance sheet)",
            "Recent bank statements",
            "Existing budgets or projections (if any)",
            "Details of loans and liabilities",
            "Cost and pricing information",
            "Business plan or expansion goals",
            "GST and income tax return copies"
        ],
        process: [
            { t: "Discovery", d: "We understand your business, goals, and current financial position." },
            { t: "Analysis", d: "Review your numbers, costs, and performance to find opportunities." },
            { t: "Strategy", d: "Build a clear, actionable financial and growth plan with you." },
            { t: "Review & Support", d: "Track progress and refine the plan as your business evolves." }
        ],
        faqs: [
            { q: "Do you prepare project reports for bank loans?", a: "Yes — we prepare detailed, bankable project reports and CMA data that lenders require for term loans and working capital." },
            { q: "Can you help improve my profit margins?", a: "We analyse your costs, pricing, and performance ratios to identify concrete ways to improve profitability." },
            { q: "Is advisory useful for a small business?", a: "Absolutely. Even simple budgeting and cash-flow planning can make a big difference for small and growing businesses." },
            { q: "How are advisory engagements priced?", a: "It depends on scope — we offer one-time engagements and ongoing retainers, always with transparent, upfront pricing." }
        ]
    }
};
